<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrastatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prastatus', function (Blueprint $table) {
            $table->id();
            $table->string('application_number');
            $table->string('identification');
            $table->string('employee');
            $table->string('document_number');
            $table->string('date_of_application');
            $table->string('citizens');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prastatus');
    }
}
