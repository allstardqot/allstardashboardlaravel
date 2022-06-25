<?php

use App\Models\Position;
use App\Models\Week;
use App\Models\Setting;
use Illuminate\Support\Carbon;

const FIXTURE_STATUS = ['NS', 'LIVE', 'HT', 'FT', 'ET' ,'PEN_LIVE' ,'AET' ,'BREAK' ,'FT_PEN' ,'CANCL' ,'POSTP' ,'INT' ,'ABAN' ,'SUSP' ,'TBA' ,'AWARDED' ,'DELAYED' ,'WO' ,'AU' ,'Deleted'];

function setting(){
    $setting = Setting::first();
    // prr($setting);
    define('PHONE',$setting->phone);
    define('EMAIL',$setting->admin_email);
    define('ADDRESS',$setting->admin_address);
    define('INSTAGRAM',$setting->instagram_url);
    define('TWITTER',$setting->twitter_url);
    define('TELEGRAM',$setting->telegram_link);
    define('DISCORD',$setting->discord_url);
    

}



// setting();

function prr($data){
 echo "<pre>";print_r($data);echo "</pre>";die;
}

function weekIdDate($date){
    $week=0;
    $data=Week::whereDate('starting_at','<=',$date)->whereDate('ending_at','>=',$date)->first();
    if(!empty($data->id)){
        $week= $data->id;
    }
    return $week;
}
function p($data){
    echo "<pre>";print_r($data);echo "</pre>";
}

function getposition($id){
    $name='';
    $position=Position::find($id);
    if(!empty($position->name)){
        $name=$position->name;
    }
    return $name;
}

function currentWeek(){
    $week=0;
    $data=Week::whereDate('starting_at','<=',Carbon::now())->whereDate('ending_at','>=',Carbon::now())->first();
    if(!empty($data->id)){
        $week= $data->id;
    }
    return $week;
}

function nextWeek(){
    $week=currentWeek();
    if(Week::where('id','>',$week)->orderBy('id','asc')->first()){
        $query=Week::where('id','>',$week)->orderBy('id','asc')->first();
        return $query->id;
    }else{
        return 0;
    }
}

function priviousWeek(){
    $week=currentWeek();
    if(Week::where('id','<',$week)->orderBy('id','desc')->first()){
        $query=Week::where('id','<',$week)->orderBy('id','desc')->first();
        return $query->id;
    }else{
        return 0;
    }
}

function defineConfigConstant(){

    $settings = \App\Models\Setting::lists('value', 'name')->where(['Settings.id'=>1])->all();

    $setting_value = 0;//Cache::read('setting_value', 'long');
    if (!$setting_value) {

        $setting_value = $settings;
        //Cache::write('setting_value', $setting_value, 'long');
    }

    $setting_value = json_decode(json_encode($setting_value),true);
    //pr($setting_value);die;
    if(!empty($setting_value)){
        foreach ($setting_value as $key => $value) {
            $constant = strtoupper($key);
            if(!defined($constant)){
                define($constant,$value);
            }
        }
    }
}
?>
