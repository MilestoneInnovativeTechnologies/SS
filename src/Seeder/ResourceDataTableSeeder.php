<?php

namespace Milestone\SS\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceData::query()
            ->create([	'id' => '327101', 	'resource' => '305105', 	'name' => 'SettingsView', 	'description' => 'View details of a settings', 	'title_field' => 'name', 											])
            ->create([	'id' => '327102', 	'resource' => '305117', 	'name' => 'UserSettingsView', 	'description' => 'View details of a user setting', 	'title_field' => 'user.name', 											])
            ->create([	'id' => '327103', 	'resource' => '305118', 	'name' => 'UserStoreAreaView', 	'description' => 'View details of user store area', 	'title_field' => 'user.name', 											])
            ->create([	'id' => '327104', 	'resource' => '305110', 	'name' => 'ProductImageView', 	'description' => 'View images of a product', 	'title_field' => 'product.name', 											])
            ->create([	'id' => '327105', 	'resource' => '305127', 	'name' => 'ReserveView', 	'description' => 'View reserve details', 	'title_field' => 'code', 											])
            ->create([	'id' => '327106', 	'resource' => '305104', 	'name' => 'MenuView', 	'description' => 'View menu details', 	'title_field' => 'name', 											])
            ->create([	'id' => '327107', 	'resource' => '305129', 	'name' => 'PrintView', 	'description' => 'View print details', 	'title_field' => 'name', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
