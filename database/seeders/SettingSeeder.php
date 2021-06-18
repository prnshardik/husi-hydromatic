<?php

    namespace Database\Seeders;
    use App\Models\Setting;

    use Illuminate\Database\Seeder;

    class SettingSeeder extends Seeder{

        public function run(){
            Setting::create([
                'key' => 'SITE_TITLE',
                'value' => 'Khusi Hydtic',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'SITE_TITLE_SF',
                'value' => 'KH',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'CONTACT_NUMBER',
                'value' => '+91-9724789079',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIN_CONTACT_NUMBER',
                'value' => '+91-9099081054',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'CONTACT_EMAIL',
                'value' => 'export@khushihydtic.com',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIN_CONTACT_EMAIL',
                'value' => 'ravi@khushihydtic.com',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'CONTACT_ADDRESS',
                'value' => '<strong>Registered Address:-</strong> Plot No:22, Gulmohar Co.Op,So Ltd, Shimpoli Road,   Borivali(West), Mumbai-400092',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIN_CONTACT_ADDRESS',
                'value' => '<strong>Branch/Courier Address:-</strong>  D-1402 Sun South Park, South Bopal,  Ahmedabad-38008',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_DRIVER',
                'value' => 'smtp',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_HOST',
                'value' => 'mail.cypherocean.com',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_PORT',
                'value' => '465',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_USERNAME',
                'value' => 'hardik@cypherocean.com',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_PASSWORD',
                'value' => 'icyPhe2!@',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_ENCRYPTION',
                'value' => 'ssl',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_FROM_ADDRESS',
                'value' => 'hardik@cypherocean.com',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'MAIL_FROM_NAME',
                'value' => 'Cypheocean',
                'type' => 'smtp',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            _setMailConfig();
        }
    }
