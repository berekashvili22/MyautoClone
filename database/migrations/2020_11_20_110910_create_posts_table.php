<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            $table->string('deal_type'); //buy/sell
            $table->string('manufacturer'); 
            $table->string('model'); 
            $table->string('prod_date'); // Y/M 
            $table->string('mileage'); 
            // $table->string('vin_code'); 
            $table->string('gearbox_type'); 
            $table->float('engine_volume'); 
            $table->boolean('turbo'); 
            $table->integer('cylinders'); 
            $table->string('doors'); 
            $table->string('fuel_type'); 
            $table->string('drive_wheels'); 
            $table->string('color'); 
            // $table->string('interior_material'); 
            // $table->integer('airbags'); 

            $table->string('wheel'); 
            $table->boolean('hydraulics'); 
            $table->boolean('rims'); 
            $table->boolean('el_window'); 
            $table->boolean('climate_control'); 
            $table->boolean('seat_heater'); 
            $table->boolean('central_lock'); 
            $table->boolean('alarm'); 
            $table->boolean('bord_computer'); 
            $table->boolean('navigation'); 
           
            $table->text('description');
            
            $table->string('name');
            $table->string('phone');
            $table->string('location');

            $table->boolean('customs');
            $table->integer('price');
            $table->string('post_type'); // normal, vip, vip + 

            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('image5');
            $table->string('image6');

            $table->timestamps();

            $table->index('user_id');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
