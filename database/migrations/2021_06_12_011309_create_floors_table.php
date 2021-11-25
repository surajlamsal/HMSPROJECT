<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateFloorsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up ()
        {
            Schema::create('floors', function (Blueprint $table) {
                $table->id();
                $table->string('floorname');
                $table->string('floornumber');
                $table->string('floordescription');
                
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
            Schema::dropIfExists('floors');
        }
    }
