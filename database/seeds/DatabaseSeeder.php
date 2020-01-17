<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Category::class, 10)->create();
      factory(App\Models\SubCategory::class, 15)->create();
      factory(App\Models\Brand::class, 5)->create();
      factory(App\Models\Product::class, 30)->create();

      DB::table('admin_roles')->insert([
      'admin_role' => 'Admin',
      'created_at' => Carbon\Carbon::now(),
      'updated_at' => Carbon\Carbon::now()
      ]);


      DB::table('admins')->insert([
      'user_name' => 'Monyet Sange',
      'email' => 'arifrufaldi@gmail.com',
      'password' => bcrypt('Lucifer2810'),
      'status' => 'active',
      'admin_role_id' => 1,
      'created_at' => Carbon\Carbon::now(),
      'updated_at' => Carbon\Carbon::now()
      ]);

      DB::table('customers')->insert([
      'user_name' => 'Helel2810',
      'email' => 'arifrufaldi@gmail.com',
      'password' => bcrypt('Lucifer2810'),
      'gender' => "Male",
      'telephone' =>  "+6285554123",
      'full_name' => "Arief Rufaidy S. L.",
      'status' => 'active',
      'created_at' => Carbon\Carbon::now(),
      'updated_at' => Carbon\Carbon::now()
      ]);

    }
}
