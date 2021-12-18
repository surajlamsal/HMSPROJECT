<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateReservationsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('guest_id');
                $table->integer('room_id');
                $table->datetime('start');
                $table->datetime('end');
                $table->integer('numberofguests');
                $table->integer('price');
                $table->timestamps();
                $table->integer('checkOutFlag_by')->nullable();
                $table->timestamp('checkOutFlag_at')->nullable();
                $table->enum('checkOutFlag', ['Yes', 'No'])->default('No');
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
            Schema::dropIfExists('reservations');
        }
    }
