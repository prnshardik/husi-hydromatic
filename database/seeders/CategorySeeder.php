<?php

    namespace Database\Seeders;
    use App\Models\Category;

    use Illuminate\Database\Seeder;

    class CategorySeeder extends Seeder{

        public function run(){
            Category::create([
                'name' => "Hydrolic Pump",
                'description' => "Hydrolic Pump description",
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Category::create([
                'name' => "Hydrolic Valve",
                'description' => "Hydrolic Valve description",
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
