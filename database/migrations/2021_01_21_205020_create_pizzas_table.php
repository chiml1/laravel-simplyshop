<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('ingredients');
            $table->float('price_s',6,2);
            $table->float('price_m',6,2);
            $table->float('price_l',6,2);
        });

        DB::table('pizzas')->insert(['id' => 1, 'name' => 'MARGHERITA', 'ingredients' => 'sos, ser', 'price_s' => 9, 'price_m' => 16, 'price_l' => 30]);
        DB::table('pizzas')->insert(['id' => 2, 'name' => 'SICILIA', 'ingredients' => 'sos, ser, szynka, oregano', 'price_s' => 12, 'price_m' => 19, 'price_l' => 33]);
        DB::table('pizzas')->insert(['id' => 3, 'name' => 'CAPRICCIOSA', 'ingredients' => 'sos, ser, szynka, pieczarki', 'price_s' => 13, 'price_m' => 20, 'price_l' => 34]);
        DB::table('pizzas')->insert(['id' => 4, 'name' => 'SALAMI', 'ingredients' => 'sos, ser, salami', 'price_s' => 13, 'price_m' => 20, 'price_l' => 34]);
        DB::table('pizzas')->insert(['id' => 5, 'name' => 'BACON', 'ingredients' => 'sos, ser, boczek, cebula, ogórek konserwowy', 'price_s' => 14, 'price_m' => 21, 'price_l' => 35]);
        DB::table('pizzas')->insert(['id' => 6, 'name' => 'POLLO', 'ingredients' => 'sos, ser, kurczak, pieczarka, kukurydza', 'price_s' => 14, 'price_m' => 21, 'price_l' => 35]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
