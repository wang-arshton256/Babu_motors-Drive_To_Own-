<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('beneficiaries', function (Blueprint $table)
    {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('id_url');

      $table->string('address');
      $table->string('phone')->unique();
      $table->string('phone2')->default('N/A')->unique();
      $table->string('unique_id');
      $table->string('payment_status')->default('true');
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
    Schema::dropIfExists('beneficiaries');
  }
}
