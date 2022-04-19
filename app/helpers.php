<?php
function  pr($data){
 echo "<pre>";print_r($data);echo "</pre>";die;
}

function p($data){
    echo "<pre>";print_r($data);echo "</pre>";
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
