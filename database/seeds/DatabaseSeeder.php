<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // $this->call(UsersTableSeeder::class);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin123'),
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'surname' => 'user',
            'username' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('Testuser123'),
            'role' => 'user',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('taller')->insert([
            'nombre' => 'Taller de naval',
            'area' => 'Tecnologia naval',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('taller')->insert([
            'nombre' => 'Taller de Mantenimiento',
            'area' => 'Ingenieria de mantenimiento',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('maquinaria')->insert([
            'serial_institucion' => 'A1B2C3D4F5G6',
            'serial_maquina' => '12345678890',
            'nombre' => 'Torno',
            'marca' => 'Black and Decker',
            'modelo' => 'STL-2342',
            'capacidad' => '60',
            'capacidad_medida' => 'Ton',
            'condicion' => 'Activa',
            'observacion' => 'Maquina en buen estado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'id_taller' => '1'
        ]);

        DB::table('maquinaria')->insert([
            'serial_institucion' => 'AEIOU123456',
            'serial_maquina' => '0987654321',
            'nombre' => 'Torno',
            'marca' => 'Black and Decker',
            'modelo' => 'STL-2342',
            'capacidad' => '60',
            'capacidad_medida' => 'Ton',
            'condicion' => 'Activa',
            'observacion' => 'Maquina en buen estado',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'id_taller' => '2'
        ]);

        for ($i=0; $i < 5; $i++) { 
            
            DB::table('plan_mantenimiento')->insert([
                'fecha' => date('Y-m-d'),
                'tipo_mantenimiento' => 'Preventivo',
                'criticidad' => 'Baja',
                'descripcion' => 'Plan de mantenimiento de rutina',
                'estatus' => $faker->randomElement(['Completado', 'Pendiente']),
                'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
                'id_maquina' => rand(1,2),
                'id_usuario' => rand(1,2)
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('herramientas')->insert([
                'nombre' => $faker->randomElement(['Martillo', 'Taladro', 'Llave', 'Destornillador']),
                'dimensiones' => rand(1,5),
                'dimensiones_medida' => $faker->randomElement(['m', 'cm', 'Inch', 'mm']),
                'capacidad' => rand(1,5),
                'capacidad_medida' => $faker->randomElement(['Ton', 'Lb', 'Inch', 'mm']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('herramienta_plan')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_herramienta' => rand(1,5),
                'id_plan' => rand(1,4),
            ]);
        }

        for ($i=0; $i < 5; $i++) { 
            DB::table('personal')->insert([
                'ci' => $faker->numberBetween('12000000', '25000000'),
                'nombre' => $faker->firstName(),
                'apellido' => $faker->lastName(),
                'nro_telefono' => $faker->numberBetween(1111111, 9999999),
                'correo_electronico' => $faker->email(),
                'area' => $faker->randomElement(['Naval', 'Ingenieria de Mantenimiento', 'Ingenieria mecanica']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('personal_plan')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_personal' => rand(1,4),
                'id_plan' => rand(1,4),
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('repuestos')->insert([
                'nombre' => $faker->randomElement(['Tornillo', 'Correa', 'Polea', 'Rodamiento']),
                'dimensiones' => rand(1,5),
                'dimensiones_medida' => $faker->randomElement(['m', 'cm', 'Inch', 'mm']),
                'capacidad' => rand(1,5),
                'capacidad_medida' => $faker->randomElement(['Ton', 'Lb', 'Inch', 'mm']),
                'costo_estimado' => rand(5, 100),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        for ($i=0; $i < 4; $i++) { 
            DB::table('compra_repuestos')->insert([
                'fecha_compra' => date('Y-m-d'),
                'costo_total' => rand(5, 100),
                'medio_pago' => $faker->randomElement(['Efectivo', 'Transferencia', 'Divisa']),
                'estatus' => $faker->randomElement(['Pago', 'En encargo', 'Sin pagar']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_plan' => rand(1,4)
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('compra_repuestos_nm')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_repuesto' => rand(1,5),
                'id_compra_repuesto' => rand(1,3),
            ]);
        }

        for ($i=0; $i < 6; $i++) { 
            DB::table('repuestos_plan_nm')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_repuesto' => rand(1,5),
                'id_plan' => rand(1,4),
            ]);
        }

    }
}