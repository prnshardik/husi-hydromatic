<?php

    namespace Database\Seeders;
    use App\Models\Product;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\File;

    class ProductSeeder extends Seeder{

        public function run(){
            Product::create([
                'name' => "Z2FS6-2-4X2QV, Double throttle check valves – sandwich module",
                'category_id' => 1,
                'description' => "Z2FS6-2-4X2QV, Double throttle check valves – sandwich module<br/>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<br/> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages",
                'image' => 'z2fs6-2-4x2qv_double_throttle_check_valves_sandwich_module.jpg',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Product::create([
                'name' => "Pilot Operated Check Valve, SL 10 PA 1-4X",
                'category_id' => 2,
                'description' => "Pilot Operated Check Valve, SL 10 PA 1-4X<br/>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<br/> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages",
                'image' => 'pilot_operated_check_valve_sl_10_pa_1-4x.jpg',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Product::create([
                'name' => "PRESSURE RELIEF VALVE DBDS 10 K1X400",
                'category_id' => 2,
                'description' => "PRESSURE RELIEF VALVE DBDS 10 K1X400<br/>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<br/> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages",
                'image' => 'pressure_relied_valve_dbds_10_k1x400.jpg',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Product::create([
                'name' => "PRESSURE RELIEF VALVE DBW 10 B2-5X315-6EG24N9K4",
                'category_id' => 2,
                'description' => "PRESSURE RELIEF VALVE DBW 10 B2-5X315-6EG24N9K4<br/>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<br/> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages",
                'image' => 'pressure_relied_valve_dbw_10_b2-5x315-6eg24n9k4.jpg',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            Product::create([
                'name' => "S 20 A1 0 Check Valve R900420525",
                'category_id' => 2,
                'description' => "S 20 A1 0 Check Valve R900420525<br/>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s<br/> It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages",
                'image' => 's_20_a1_0_check_valve_r900420525.jpg',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path('/backend/dummy/products/z2fs6-2-4x2qv_double_throttle_check_valves_sandwich_module.jpg')) && !file_exists(public_path('/uploads/products/z2fs6-2-4x2qv_double_throttle_check_valves_sandwich_module.jpg')) ){
                File::copy(public_path('/backend/dummy/products/z2fs6-2-4x2qv_double_throttle_check_valves_sandwich_module.jpg'), public_path('/uploads/products/z2fs6-2-4x2qv_double_throttle_check_valves_sandwich_module.jpg'));
            }

            if(file_exists(public_path('/backend/dummy/products/pilot_operated_check_valve_sl_10_pa_1-4x.jpg')) && !file_exists(public_path('/uploads/products/pilot_operated_check_valve_sl_10_pa_1-4x.jpg')) ){
                File::copy(public_path('/backend/dummy/products/pilot_operated_check_valve_sl_10_pa_1-4x.jpg'), public_path('/uploads/products/pilot_operated_check_valve_sl_10_pa_1-4x.jpg'));
            }

            if(file_exists(public_path('/backend/dummy/products/pressure_relied_valve_dbds_10_k1x400.jpg')) && !file_exists(public_path('/uploads/products/pressure_relied_valve_dbds_10_k1x400.jpg')) ){
                File::copy(public_path('/backend/dummy/products/pressure_relied_valve_dbds_10_k1x400.jpg'), public_path('/uploads/products/pressure_relied_valve_dbds_10_k1x400.jpg'));
            }

            if(file_exists(public_path('/backend/dummy/products/pressure_relied_valve_dbw_10_b2-5x315-6eg24n9k4.jpg')) && !file_exists(public_path('/uploads/products/pressure_relied_valve_dbw_10_b2-5x315-6eg24n9k4.jpg')) ){
                File::copy(public_path('/backend/dummy/products/pressure_relied_valve_dbw_10_b2-5x315-6eg24n9k4.jpg'), public_path('/uploads/products/pressure_relied_valve_dbw_10_b2-5x315-6eg24n9k4.jpg'));
            }

            if(file_exists(public_path('/backend/dummy/products/s_20_a1_0_check_valve_r900420525.jpg')) && !file_exists(public_path('/uploads/products/s_20_a1_0_check_valve_r900420525.jpg')) ){
                File::copy(public_path('/backend/dummy/products/s_20_a1_0_check_valve_r900420525.jpg'), public_path('/uploads/products/s_20_a1_0_check_valve_r900420525.jpg'));
            }
        }
    }
