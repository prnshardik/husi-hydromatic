<?php

    namespace Database\Seeders;
    use App\Models\Product;

    use Illuminate\Database\Seeder;

    class ProductSeeder extends Seeder{

        public function run(){
            for($i=1; $i <= 10; $i++){
                $number = _check($i);

                $category_id = 2;

                if($number)
                    $category_id = 1;
                
                Product::create([
                    'name' => "Product $i",
                    'category_id' => $category_id,
                    'description' => "Product $i description",
                    'image' => 'default.png',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => 1
                ]);
            }
        }
    }
