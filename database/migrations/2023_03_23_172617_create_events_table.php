<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->bigInteger('theater_id')->unsigned()->nullable();
            $table->foreign('theater_id')->references('id')->on('theaters'); 
            $table->longText('description')->nullbale();
            $table->string('event_type')->nullbale();
            $table->string('event_image')->nullbale();
            $table->date('date');
            $table->string('slug_url')->nullable();
            $table->string('presented_by')->nullable();
            $table->longText('writer_and_directers')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('admins'); 
            $table->bigInteger('modified_by')->unsigned()->nullable();
            $table->foreign('modified_by')->references('id')->on('admins'); 
            $table->softDeletes();
             $table->string('status')->default('active');
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
        Schema::dropIfExists('events');
    }
};
