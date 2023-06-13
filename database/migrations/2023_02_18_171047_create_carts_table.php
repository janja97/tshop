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
        Schema::table('carts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('prod_id');
            $table->string('prod_qty');
            $table->string('ime')->nullable();
            $table->string('prezime')->nullable();
            $table->string('adresa')->nullable();
            $table->string('grad')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon')->nullable();
            $table->decimal('total_price')->default(0);
            $table->boolean('kupljen')->default(false);
            // $table->decimal('total_price')->default(0);

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
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('ime');
            $table->dropColumn('prezime');
            $table->dropColumn('adresa');
            $table->dropColumn('grad');
            $table->dropColumn('email');
            $table->dropColumn('telefon');
            $table->dropColumn('kupljen');
            $table->decimal('total_price');

        });
    }
};
