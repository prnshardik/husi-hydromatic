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
                'value' => '+91 00000 00000',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'CONTACT_EMAIL',
                'value' => 'info@khusihydtic.com',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Setting::create([
                'key' => 'CONTACT_ADDRESS',
                'value' => 'G-13, City Plex,<br./>City Center,<br/>Rajkot,<br/>Rajkot-380000',
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
