<?php

namespace Milestone\SS\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormDefaultTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormDefault::query()
            ->create([	'id' => '319101', 	'resource_form' => '309106', 	'name' => 'end_num', 	'value' => '0', 		'attribute' => 'end_num', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
