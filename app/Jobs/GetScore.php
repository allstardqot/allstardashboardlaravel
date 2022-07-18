<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\FantasyPoint;
use App\Models\Fixture;
use App\Models\Squad;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;
use Illuminate\Support\Facades\Log;


class GetScore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $fixtureId;
    private bool $autoSet;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */

    /**
     * Create a new job instance.
     *
     * @param $fixtureId
     * @param bool $autoSet
     */
    public function __construct($fixtureId,bool $autoSet = true)
    {
        $this->queue = 'score';
        $this->autoSet = $autoSet;
        $this->fixtureId = $fixtureId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api = new EntitySport();
        $fixture = Fixture::query()
                ->where('id', $this->fixtureId)
                ->first();

        if ($fixture) {

            if( ($fixture->status == FIXTURE_STATUS[0]) || (strtotime($fixture->starting_at) >= time())  ) {
                if ($this->autoSet) {
                    self::dispatch($this->fixtureId)->delay(now()->addMinutes(2));
                }
            } else {

                $matchScore = $api->getMacthScore($this->fixtureId . '?include=lineup.player,bench.player');
                //Log::info("getScore runningfff".$this->fixtureId.'--'.json_encode($matchScore));
                if($matchScore['time']){
                    $fixture->status=isset($matchScore['time']['status'])?$matchScore['time']['status']:$fixture->status;
                    $fixture->scores=is_array($matchScore['scores'])?json_encode($matchScore['scores']):'';
                    $fixture->update();
                }

                if (!empty($matchScore['lineup']['data'])) {
                    foreach ($matchScore['lineup']['data'] as $scoreValue) {
                        
                        //echo $scoreValue['player_id']."finee";die;
                        $savePoint=$commonTotalPoints=$totalPoints = 0;

                        $goalsPoint = ['scored' => 0, 'assists' => 0, 'conceded' => 0, 'owngoals' => 0, 'team_conceded' => 0];
                        if($scoreValue['position'] == 'G'){
                            $savePreThreeShot = intval($scoreValue['stats']['other']['saves'] / 3);
                            $savePoint = $savePreThreeShot * $this->staticPoint('3_shot_goalkeeper');
                        }
                        
                        $minute_play = ($scoreValue['stats']['other']['minutes_played'] <= 60) ? $this->staticPoint('play_60_min') : $this->staticPoint('play_60_min_more');
                        //echo $minute_play;die;
                        $otherPoint = ['aerials_won' => 0, 'punches' => 0, 'offsides' => 0, 'saves' => $savePoint, 'inside_box_saves' => 0, 'pen_scored' => 0, 'pen_missed' => 0, 'pen_saved' => 0, 'pen_committed' => 0, 'pen_won' => 0, 'hit_woodwork' => 0, 'tackles' => 0, 'blocks' => 0, 'interceptions' => 0, 'clearances' => 0, 'dispossesed' => 0, 'minutes_played' => $minute_play];
                        $yellowCardPoint = $scoreValue['stats']['cards']['yellowcards'] * $this->staticPoint('yellow_card');
                        $redCardPoint = $scoreValue['stats']['cards']['redcards'] * $this->staticPoint('red_card');
                        $yellowredCardPoint = $scoreValue['stats']['cards']['yellowredcards'] * $this->staticPoint('yellowredcards');
                        $assistsPoint = $scoreValue['stats']['goals']['assists'] * $this->staticPoint('assists');
                        $panaltySavePoint = $scoreValue['stats']['other']['pen_saved'] * $this->staticPoint('penalty_save');
                        $panaltyMissPoint = $scoreValue['stats']['other']['pen_missed'] * $this->staticPoint('penalty_miss');
                        $commonTotalPoints = $minute_play + $yellowCardPoint + $redCardPoint + $yellowredCardPoint + $assistsPoint + $panaltySavePoint + $panaltyMissPoint;
                        
                        $cardsPoint = ['yellowcards' => $yellowCardPoint, 'redcards' => $redCardPoint, 'yellowredcards' => $yellowredCardPoint];

                        if ($scoreValue['position'] == 'G' || $scoreValue['position'] == 'D') {
                            $scorePoint = $scoreValue['stats']['goals']['scored'] * $this->staticPoint('goalkeeper_defender_goal');
                            $cleanSheetPoint = ($scoreValue['stats']['goals']['conceded']==0) ? $this->staticPoint('clean_sheet_goalkeeper_defender'):0;
                            $concededPoint=0;
                            if($scoreValue['stats']['goals']['conceded']>2){
                                $concededPoint = $scoreValue['stats']['goals']['conceded'] * $this->staticPoint('goal_conceded_goalkeeper_defender');
                            }
                            $owngoalsPoints = $scoreValue['stats']['goals']['owngoals'] * $this->staticPoint('own_goal');
                            $teamConcededPoints = $scoreValue['stats']['goals']['team_conceded'] * $this->staticPoint('team_conceded');
                             
                            $totalPoints = $scorePoint + $concededPoint + $owngoalsPoints + $teamConcededPoints + $savePoint + $cleanSheetPoint;

                            $goalsPoint = ['scored' => $scorePoint, 'assists' => $assistsPoint, 'conceded' => $concededPoint, 'owngoals' => $owngoalsPoints, 'team_conceded' => $teamConcededPoints,'cleansheet'=>$cleanSheetPoint];
                        }elseif ($scoreValue['position'] == 'M') {
                            $scorePoint = $scoreValue['stats']['goals']['scored'] * $this->staticPoint('midfielder_goal');
                            
                            $cleanSheetPoint = ($scoreValue['stats']['goals']['conceded']==0) ? $this->staticPoint('clean_sheet_midfielder'):0;
                            $concededPoint = $scoreValue['stats']['goals']['conceded'] * $this->staticPoint('conceded');
                            $owngoalsPoints = $scoreValue['stats']['goals']['owngoals'] * $this->staticPoint('own_goal');
                            $teamConcededPoints = $scoreValue['stats']['goals']['team_conceded'] * $this->staticPoint('team_conceded');

                            $totalPoints = $scorePoint + $concededPoint + $owngoalsPoints + $teamConcededPoints + $cleanSheetPoint;
                            $goalsPoint = ['scored' => $scorePoint, 'assists' => $assistsPoint, 'conceded' => $concededPoint, 'owngoals' => $owngoalsPoints, 'team_conceded' => $teamConcededPoints,'cleansheet'=>$cleanSheetPoint];
                        }elseif ($scoreValue['position'] == 'A') {
                            $scorePoint = $scoreValue['stats']['goals']['scored'] * $this->staticPoint('forward_goal');
                            $totalPoints = $scorePoint;
                            
                            $goalsPoint = ['scored' => $scorePoint];
                        }
                        $totalPoints=$totalPoints+$commonTotalPoints;

                        $s = Squad::query()->updateOrCreate([
                            'player_id' => $scoreValue['player_id'],
                            'fixture_id' => $scoreValue['fixture_id'],
                            'team_id' => $scoreValue['team_id'],
                        ], [
                            'shots' => !empty($scoreValue['stats']['shots']) ? json_encode($scoreValue['stats']['shots']) : '',
                            'goals' => !empty($scoreValue['stats']['goals']) ? json_encode($scoreValue['stats']['goals']) : '',
                            'goal_points' => json_encode($goalsPoint),
                            'fouls' => !empty($scoreValue['stats']['fouls']) ? json_encode($scoreValue['stats']['fouls']) : '',
                            'cards' => !empty($scoreValue['stats']['cards']) ? json_encode($scoreValue['stats']['cards']) : '',
                            'card_points' => json_encode($cardsPoint),
                            'passing' => !empty($scoreValue['stats']['passing']) ? json_encode($scoreValue['stats']['passing']) : '',
                            'dribbles' => !empty($scoreValue['stats']['dribbles']) ? json_encode($scoreValue['stats']['dribbles']) : '',
                            'duels' => !empty($scoreValue['stats']['duels']) ? json_encode($scoreValue['stats']['duels']) : '',
                            'other' => !empty($scoreValue['stats']['other']) ? json_encode($scoreValue['stats']['other']) : '',
                            'other_points' => json_encode($otherPoint),
                            'total_points' => $totalPoints,
                            //'rating' => !empty($scoreValue['stats']['rating']) ? $scoreValue['stats']['rating'] : '',
                        ]);
                    }
                    //SetUserTeamTotal::dispatch($this->fixtureId);
                }
                if ($this->autoSet) {
                    if ($fixture->status === FIXTURE_STATUS[0] || $fixture->status === FIXTURE_STATUS[1] || $fixture->status === FIXTURE_STATUS[2]) {
                        self::dispatch($this->fixtureId)->delay(now()->addMinutes(2));
                    }
                }
            }
        }
    }

    public function staticPoint($code)
    {
        $data = FantasyPoint::query()->where(['code' => $code])->first();
        if (!empty($data['point'])) {
            return $data['point'];
        }
        return 0;
    }
}
