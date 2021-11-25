<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Support\Facades\Schema;

    class CreatepermissionTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            /*Schema::create('permissions', function (Blueprint $table) {

                $table->id();
                $table->string('permissionname');
                $table->enum('deletedstatus', ['0', '1'])->default('0');
                $table->timestamps();
            });*/
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down ()
        {
            Schema::dropIfExists('permissions');
        }
    }
