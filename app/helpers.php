<?php

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

    if (!function_exists('_setMailConfig')) {
        function _setMailConfig(){
            $mail_driver = _settings('MAIL_DRIVER');

            $config = [
                'transport' => _settings('MAIL_DRIVER'),
                'host' => _settings('MAIL_HOST'),
                'port' => _settings('MAIL_PORT'),
                'encryption' => _settings('MAIL_ENCRYPTION'),
                'username' => _settings('MAIL_USERNAME'),
                'password' => _settings('MAIL_PASSWORD'),
                'timeout' => null
            ];

            config(['mail.mailers.smtp' => $config]);

            Artisan::call('config:cache');

            return true;
        }   
    }
?>