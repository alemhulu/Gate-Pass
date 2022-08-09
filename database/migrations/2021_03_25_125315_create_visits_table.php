<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->integer('requestor_id')->references('id')->on('users');
            $table->date('request_date');
            $table->string('visitor_list');
            $table->string('contact_number')->nullable();
            $table->date('visit_date');
            $table->boolean('has_car');
            $table->integer('code');
            $table->string('plates')->nullable();
            $table->string('qr_image')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('visits');
    }
}
