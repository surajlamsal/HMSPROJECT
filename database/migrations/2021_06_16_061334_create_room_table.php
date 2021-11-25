<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRoomTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('room', function (Blueprint $table) {
                $table->id();
                $table->string("roomno");
                $table->string("floor_id");
                $table->string("roomdescription");
                $table->string("roomtype_id");

                $table->enum('status', ['0', '1'])->default('1');
                $table->timestamp('created_at')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->unsignedBigInteger('deleted_by')->nullable();
                $table->enum('deletedstatus', ['0', '1'])->default('0');
                $table->enum('availability', ['Yes', 'No'])->default('Yes');


            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down ()
        {
            Schema::dropIfExists('rooms');
        }
    }
