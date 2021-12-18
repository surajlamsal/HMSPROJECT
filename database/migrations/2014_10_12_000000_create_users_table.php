<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('role')->default('User');

                $table->string('dob')->nullable();
                $table->string('phone')->nullable();
                $table->string('department')->nullable();
                $table->string('designation')->nullable();
                $table->string('address')->nullable();
                $table->string('employeeimage')->nullable();
                $table->string('citizenship')->nullable();
                $table->string('pannumber')->nullable();
                $table->string('dateofjoining')->nullable();
                $table->string('salary')->nullable();
                $table->string('shift')->nullable();


                $table->rememberToken();
                $table->timestamps();
            });
            /*$data = [
                [
                    'name' => 'test@test.com',
                    'email' => 'test@test.com',
                    'password' => Hash::make('test@test.com'),
                ]
            ];
            DB::table('users')->insert($data);*/
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down ()
        {
            Schema::dropIfExists('users');
        }
    }
