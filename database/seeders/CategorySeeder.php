<?php

    namespace Database\Seeders;
    use App\Models\Category;

    use Illuminate\Database\Seeder;

    class CategorySeeder extends Seeder{

        public function run(){
            Category::create([
                'name' => 'Category 1',
                'description' => 'Category 1 description',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Category::create([
                'name' => 'Category 2',
                'description' => 'Category 2 description',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Category::create([
                'name' => 'Category 3',
                'description' => 'Category 3 description',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Category::create([
                'name' => 'Category 4',
                'description' => 'Category 4 description',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Category::create([
                'name' => 'Category 5',
                'description' => 'Category 5 description',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
