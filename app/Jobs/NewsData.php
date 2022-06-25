<?php

namespace App\Jobs;

use App\EntitySport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\News;
use App\Models\Team;

class NewsData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $season_id;
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
    public function __construct()
    {
        $this->queue = 'newsdata';
        //$this->season_id = $season_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api = new EntitySport();
        $getNews = $api->getAllNews('');
        foreach($getNews as $newsData){
            $fixtureQuery = News::query()->updateOrCreate([
                'fixture_id' => $newsData['fixture_id'],
            ], [
                'title' => $newsData['introduction'],
                'localteam' => $newsData['localteam'],
                'visitorteam' => $newsData['visitorteam'],
                'news_created_At' => $newsData['created_at']
            ]);
        }
    }
}
