<?php

use Illuminate\Database\Seeder;

class PetsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['cachorro', 'gato'];
        foreach ($types as $type) {
            DB::table('pets_types')->insert([
                'name' => $type
            ]);
        }
    }
}
