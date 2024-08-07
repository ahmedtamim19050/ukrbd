<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.admin'),
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => __('voyager::seeders.roles.user'),
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'vendor']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Vendor',
            ])->save();
        }
        $role = Role::firstOrNew(['name' => 'marchentiger']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Marchentiger',
            ])->save();
        }
    }
}
