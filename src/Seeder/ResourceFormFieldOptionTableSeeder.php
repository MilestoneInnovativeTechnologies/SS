<?php

namespace Milestone\SS\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_ = \DB::statement('SELECT @@GLOBAL.foreign_key_checks');
        \DB::statement('set foreign_key_checks = 0');
        \Milestone\Appframe\Model\ResourceFormFieldOption::query()
            ->create([	'id' => '312101', 	'form_field' => '310103', 	'type' => 'Enum', 													])
            ->create([	'id' => '312102', 	'form_field' => '310105', 	'type' => 'List', 	'detail' => '322113', 	'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312103', 	'form_field' => '310106', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312104', 	'form_field' => '310109', 	'type' => 'Enum', 													])
            ->create([	'id' => '312105', 	'form_field' => '310110', 	'type' => 'List', 	'detail' => '322113', 	'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312106', 	'form_field' => '310111', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312107', 	'form_field' => '310112', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312108', 	'form_field' => '310113', 	'type' => 'Enum', 													])
            ->create([	'id' => '312109', 	'form_field' => '310114', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'narration', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312110', 	'form_field' => '310120', 	'type' => 'Enum', 													])
            ->create([	'id' => '312111', 	'form_field' => '310121', 	'type' => 'List', 	'detail' => '322109', 	'value_attr' => 'code', 	'label_attr' => 'code_name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312112', 	'form_field' => '310122', 	'type' => 'Foreign', 		'value_attr' => 'id', 	'label_attr' => 'name', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312113', 	'form_field' => '310128', 	'type' => 'Enum', 													])
            ->create([	'id' => '312114', 	'form_field' => '310129', 	'type' => 'Enum', 													])
            ->create([	'id' => '312115', 	'form_field' => '310135', 	'type' => 'Enum', 													])
            ->create([	'id' => '312116', 	'form_field' => '310136', 	'type' => 'List', 	'detail' => '322112', 	'value_attr' => 'id', 	'label_attr' => 'name_login', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312117', 	'form_field' => '310137', 	'type' => 'List', 	'detail' => '322104', 	'value_attr' => 'id', 	'label_attr' => 'name_reference', 	'preload' => 'Yes', 									])
            ->create([	'id' => '312118', 	'form_field' => '310140', 	'type' => 'Enum', 													])
            ->create([	'id' => '312119', 	'form_field' => '310157', 	'type' => 'Enum', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
