<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\Permissions;

class GenerateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role = new Role;
        $role->role_name = 'Admin';
        $role->permissions = json_encode([
            Permissions::__ADMIN__
        ]);
        $role->save();

        $role = new Role;
        $role->role_name = 'Bezoeker';
        $role->permissions = json_encode([

        ]);
        $role->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \App\Model\Role::query()->delete();
    }
}
