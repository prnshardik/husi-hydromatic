<?php
    if(!function_exists('_site_title')){
        function _site_title(){
            return 'Khusi Hydtic';
        }
    }

    if(!function_exists('_site_title_sf')){
        function _site_title_sf(){
            return 'KH';
        }
    }

    if(!function_exists('_mail_from')){
        function _mail_from(){
            return 'info@khusihydromatic.com';
        }
    }  

    if (!function_exists('_settings')) {
        function _settings($key = '') {
            if($key == '')
                return NULL;

            $data = DB::table('settings')->select('value')->where(['key' => $key])->first();

            if(!empty($data))
                return $data->value;
            else
                return NULL;
        }
    }

    if (!function_exists('_check')) {
        function _check($number){
            if($number == 0)
                return 1;
            else if($number == 1)
                return 0;
            else if($number<0)
                return _check(-$number);
            else
                return _check($number-2);        
        }
    }
?>