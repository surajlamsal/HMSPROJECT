<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;

    class PermissionTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run ()
        {
            $permissions = [
                'role-list',
                'role-create',
                'role-edit',
                'role-delete',
                'users-list',
                'users-create',
                'users-edit',
                'users-delete',
                /*'dashboard-list',*/
                'floor-list',
                'floor-create',
                'floor-edit',
                'floor-delete',
                'amenities-list',
                'amenities-create',
                'amenities-edit',
                'amenities-delete',
                'department-list',
                'department-create',
                'department-edit',
                'department-delete',
                'room-list',
                'room-create',
                'room-edit',
                'room-delete',
                'roomtype-list',
                'roomtype-create',
                'roomtype-edit',
                'roomtype-delete',
                'housekeeping-list',
                'housekeeping-create',
                'housekeeping-edit',
                'housekeeping-delete',
                'shift-list',
                'shift-create',
                'shift-edit',
                'shift-delete',
                'guest-list',
                'guest-create',
                'guest-edit',
                'guest-delete',
                'fullcalender-list',
                'checkout-list',
                'reservation-list',
                'reservation-create',
                'reservation-edit',
                'reservation-delete',
                'halltype-list',
                'halltype-create',
                'halltype-edit',
                'halltype-delete',

            ];
            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
            }
        }
    }
