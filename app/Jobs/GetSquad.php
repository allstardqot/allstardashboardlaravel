<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Fixture;
use App\Models\Player;
use App\Models\Squad;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;
use Illuminate\Support\Facades\Log;


class GetSquad implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $fixtureId;
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
    public function __construct($fixtureId)
    {
        $this->queue = 'squad';
        $this->fixtureId = $fixtureId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("squad running".$this->fixtureId);

        $api = new EntitySport();
        $fixtureData=Fixture::find($this->fixtureId);
        $teamArray = [$fixtureData['localteam_id'], $fixtureData['visitorteam_id']];
        $season_id=$fixtureData['season_id'];
        foreach ($teamArray as $teamValue) {
            if (!empty($teamValue)) {
                $players = $api->getSquads($season_id.'/team/' . $teamValue . '?include=player');
                foreach ($players as $playerData) {
                    if (!empty($playerData['player']['data'])) {
                        $playerDetail = $playerData['player']['data'];
                        if ($playerDetail['birthdate']) {
                            $convert = str_replace("/", "-", $playerDetail['birthdate']);
                            $date = date_create($convert);
                            $playerDetail['birthdate'] = date_format($date, "Y/m/d H:i:s");
                        }
                        $playerQuery = Player::query()->updateOrCreate([
                            'id' => $playerDetail['player_id'],
                            'team_id' => $teamValue,
                        ], [
                            //'team_id' => $playerDetail['team_id'],
                            'country_id' => $playerDetail['country_id'],
                            'position_id' => $playerDetail['position_id'],
                            'common_name' => $playerDetail['common_name'],
                            'display_name' => $playerDetail['display_name'],
                            'fullname' => $playerDetail['fullname'],
                            'firstname' => $playerDetail['firstname'],
                            'lastname' => $playerDetail['lastname'],
                            'nationality' => $playerDetail['nationality'],
                            'birthdate' => $playerDetail['birthdate'],
                            'birthcountry' => $playerDetail['birthcountry'],
                            'birthplace' => $playerDetail['birthplace'],
                            'height' => $playerDetail['height'],
                            'weight' => $playerDetail['weight'],
                            'image_path' => $playerDetail['image_path'],
                        ]);
                        $s = Squad::query()->updateOrCreate([
                            'player_id' => $playerDetail['player_id'],
                            'fixture_id' => $this->fixtureId,
                            'team_id' => $teamValue,
                        ], [
                            'team_id' => $teamValue,
                            'rating' => $playerData['rating'],
                            'card' => json_encode(['yellowcards' => $playerData['yellowcards'], 'redcards' => $playerData['redcards'], 'yellowredcards' => $playerData['yellowred']])
                        ]);
                    }
                }
            }
        }
    }
}
