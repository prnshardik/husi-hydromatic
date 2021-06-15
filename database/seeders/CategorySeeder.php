<?php

    namespace Database\Seeders;
    use App\Models\Category;

    use Illuminate\Database\Seeder;

    class CategorySeeder extends Seeder{

        public function run(){
            for($i=1; $i <= 5; $i++){
                Category::create([
                    'name' => "Category $i",
                    'description' => "Category $i description",
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => 1
                ]);
            }
        }
    }
