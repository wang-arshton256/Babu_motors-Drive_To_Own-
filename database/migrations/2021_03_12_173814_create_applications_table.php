<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('applications', function (Blueprint $table)
    {
      $table->id();
      $table->string('unique_id')->unique();
      $table->string('car_unique_id');
      $table->bigInteger('amount');

      $table->bigInteger('initial_payment');
      $table->string('status')->default('pending');
      $table->date('final_payment_date');
      $table->bigInteger('weekly_payment');
      $table->string('submited_by');
      $table->string('payment_status')->default('NA');
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
    Schema::dropIfExists('applications');
  }
}
