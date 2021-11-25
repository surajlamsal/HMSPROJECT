<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRoomTypesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('roomtype', function (Blueprint $table) {
                $table->id();
                $table->string('roomtypename');
                $table->string('description');
                $table->enum('occupancy', ['Adult', 'Child']);
                $table->string('roomtypeimage')->nullable();
                $table->string('baseoccupancy');
                $table->string('higheroccupancy');
                $table->enum('extrabed', ['Yes', 'No']);
                $table->string('baseprice');
                $table->string('additionalprice');
                $table->string('extrabedprice');
                $table->string('amenities_id');
                $table->enum('status', ['0', '1'])->default('1');
                $table->timestamp('created_at')->nullable();
                $table->unsignedBigInteger('created_by')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->unsignedBigInteger('updated_by')->nullable();
                $table->timestamp('deleted_at')->nullable();
                $table->unsignedBigInteger('deleted_by')->nullable();
                $table->enum('deletedstatus', ['0', '1'])->default('0');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down ()
        {
            Schema::dropIfExists('roomtype');
        }
    }
