<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateGuestsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('guests', function (Blueprint $table) {
                $table->id();
                $table->string('guestname');
                $table->string('address');
                $table->string('email')->unique();
                $table->string('phone');
                $table->string('citizenship');
                $table->integer('roomno')->nullable();
                $table->date('checkin')->nullable();
                $table->date('checkout')->nullable();
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
            Schema::dropIfExists('guests');
        }
    }
