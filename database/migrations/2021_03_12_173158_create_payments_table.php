<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('payments', function (Blueprint $table)
    {
      $table->id();
      $table->date('payement_date');
      $table->bigInteger('overcharge')->default(00);
      $table->bigInteger('undercharge')->default(00);
      $table->string('payement_for');
      $table->bigInteger('amount');
      $table->string('unique_id');
      $table->string('payment_mode');
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
    Schema::dropIfExists('payments');
  }
}
