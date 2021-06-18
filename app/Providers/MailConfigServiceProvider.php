<?php

    namespace App\Providers;

    use Illuminate\Support\ServiceProvider;
    use Config;

    class MailConfigServiceProvider extends ServiceProvider{
        /**
         * Register services.
         *
         * @return void
         */
        public function register(){
            //
        }

        /**
         * Bootstrap services.
         *
         * @return void
         */
        public function boot(){
            $config = [
                'driver' => _settings('MAIL_DRIVER'),
                'host' => _settings('MAIL_HOST'),
                'port' => _settings('MAIL_PORT'),
                'username' => _settings('MAIL_USERNAME'),
                'password' => _settings('MAIL_PASSWORD'),
                'encryption' => _settings('MAIL_ENCRYPTION'),
                'from'       => ['address' => _settings('MAIL_USERNAME'), 'name' => _settings('MAIL_FROM_NAME')],
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            ];

            Config::set('mail', $config);
        }
    }
