<?php

    namespace Database\Seeders;

    use App\Models\Department;
    use Illuminate\Database\Seeder;

    class DepartmentSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run ()
        {
            $data =
                [
                    [
                        "id" => "1",
                        "departmentname" => "HouseKeeping",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "2",
                        "departmentname" => "Kitchen",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "3",
                        "departmentname" => "Account",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                    [
                        "id" => "4",
                        "departmentname" => "Front Office",
                        "status" => "1",
                        "created_by" => null,
                        "updated_by" => null,
                        "created_at" => null,
                        "updated_at" => null,
                        "deleted_by" => null,
                        "deletedstatus" => "0",
                        "deleted_at" => null
                    ],
                ];
            $chunks = array_chunk($data, 5000);
            Department::truncate();
            foreach ($chunks as $chunk) {
                Department::insert($chunk);
            }
        }
    }
