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
        Schema::create('buy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prod_id');
            $table->integer('prod_qty');
            $table->string('ime');
            $table->string('prezime');
            $table->string('adresa');
            $table->string('grad');
            $table->string('email');
            $table->string('telefon');
            $table->float('total_price');
            $table->timestamps();

            // Dodajte strani ključ za user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Dodajte strani ključ za prod_id
            $table->foreign('prod_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy');
    }
};
