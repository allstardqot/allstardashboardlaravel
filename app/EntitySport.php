<?php

namespace App;

use App\Models\Fixture;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class EntitySport
{
    public function http($url, $params = []): Response
    {
        $token = 'ibXid00Vo8GJc3BqCW7laSehfNkNUWBaCB4ZhxcYzCvA0z92LgKshco4Zao0';
        //prr('https://soccer.sportmonks.com/api/v2.0/' . $url.'/'.$params.'?api_token='.$token);
        return Http::get('https://soccer.sportmonks.com/api/v2.0/' . $url.'/'.$params.'?api_token='.$token);
    }

    public function httpParameter($url, $params = []): Response
    {
        $token = 'ibXid00Vo8GJc3BqCW7laSehfNkNUWBaCB4ZhxcYzCvA0z92LgKshco4Zao0';
        //pr('https://soccer.sportmonks.com/api/v2.0/' . $url.'/'.$params.'?api_token='.$token);
        return Http::get('https://soccer.sportmonks.com/api/v2.0/' . $url.'/'.$params.'&api_token='.$token);
    }

    public function login()
    {
        // https://doc.entitysport.com/#obtaining-token
        $keys = Redis::get('entity_sport');
        // Log::info(json_encode($keys)."Entity Key");

        $params = json_decode($keys, true);
        $response = Http::get('https://rest.entitysport.com/v2/auth', array_merge(['extend' => 1], $params));

        if ($response->successful()) {
            $status = $response->json('status');
            if ($status == 'ok') {
                $data = $response->json('response.token');
                if (!is_null($data)) {
                    Redis::set('entity_sport', $data);
                    return $data;
                }
            }
        }

        return null;
    }

    public function getFixture($params = []): array
    {
        // https://doc.entitysport.com/#matches-list-api
        $response = $this->httpParameter('fixtures/between', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
            //$status = $response->json('status');
            // p($response);
            // echo $status."tttttttt";
            // pr(json_decode($response));

            // if ($status == 'ok') {
            //     $data = $response->json('response.items');
            //     if (!is_null($data)) {
            //         return $data;
            //     }
            // } elseif ($status == 'unauthorized') {
            //     $this->login();
            // }
        }

        return [];
    }

    public function getSeason($params = []): array
    {
        $response = $this->http('seasons', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
        }

        return [];
    }

    public function getLeagueSeason($params = []): array
    {
        $response = $this->http('leagues/search', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
        }

        return [];
    }

    public function team($params = []): array
    {
        $response = $this->http('teams', $params); 
        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
        }
    }

    public function getSquad($params = []): array
    {
        // https://doc.entitysport.com/#matches-list-api
        $response = $this->http('livescores', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
            //$status = $response->json('status');
            // p($response);
            // echo $status."tttttttt";
            // pr(json_decode($response));

            // if ($status == 'ok') {
            //     $data = $response->json('response.items');
            //     if (!is_null($data)) {
            //         return $data;
            //     }
            // } elseif ($status == 'unauthorized') {
            //     $this->login();
            // }
        }

        return [];
    }

    public function getLeague($params = []): array
    {
        $response = $this->http('leagues', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            return $arraData['data'];
        }
        return [];
    }

    public function getTeam($params = []): array
    {
        // https://doc.entitysport.com/#matches-list-api
        $response = $this->http('teams/season', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }

    public function getSquads($params = []): array
    {
        $response = $this->httpParameter('squad/season', $params);
        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }

    public function getLineup($params = []): array
    {
        $response = $this->httpParameter('fixtures', $params);
        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }

    public function getPlayer($params = []): array
    {
        // https://doc.entitysport.com/#matches-list-api
        $response = $this->http('countries', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }

    public function getMacthScore($params = []): array
    {
        $response = $this->httpParameter('fixtures', $params);

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }
    public function getAllNews()
    {
        $response = $this->http('news','fixtures');

        if ($response->successful()) {
            $arraData= json_decode($response,true);
            if(!empty($arraData['data'])){
                return $arraData['data'];
            }
        }
        return [];
    }

    public function getFantasyPoints($fixtureId)
    {
        // https://doc.entitysport.com/#match-fantasy-points-api
        $response = $this->http('matches/' . $fixtureId . '/newpoint');

        if ($response->successful()) {
            $status = $response->json('status');
            if ($status == 'ok') {
                $data = $response->json('response');
                if (!is_null($data)) {
                    return $data;
                }
            } elseif ($status == 'unauthorized') {
                $this->login();
            }
        }

        return null;
    }

    public function getScorecard($id)
    {
        // https://doc.entitysport.com/#match-scorecard-api
        $response = $this->http('matches/' . $id . '/scorecard');

        if ($response->successful()) {
            $status = $response->json('status');
            if ($status == 'ok') {
                $data = $response->json('response');
                if (!is_null($data)) {
                    return $data;
                }
            } elseif ($status == 'unauthorized') {
                $this->login();
            }
        }

        return null;
    }
}
