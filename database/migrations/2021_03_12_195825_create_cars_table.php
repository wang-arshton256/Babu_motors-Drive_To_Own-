<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('cars', function (Blueprint $table)
    {
      $table->id();
      $table->string('car_unique_id');
      $table->string('brand');
      $table->string('model')->unique();
      $table->string('reg_no');
      $table->string('eng_no');

      $table->string('chasis_no');
      $table->bigInteger('price');
      $table->string('color');

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
    Schema::dropIfExists('cars');
  }
}
