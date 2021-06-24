<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEaTzTourAdditionalPriceColumnsToBravoTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            //EA Price
            $table->decimal('ea_price', 12,2)->nullable();
            $table->decimal('ea_sale_price', 12,2)->nullable();

            //EA Tour type
            $table->integer('ea_duration')->nullable();
            $table->integer('ea_min_people')->nullable();
            $table->integer('ea_max_people')->nullable();

            //TZ Price
            $table->decimal('ez_price', 12,2)->nullable();
            $table->decimal('ez_sale_price', 12,2)->nullable();

            //TZ Tour type
            $table->integer('ez_duration')->nullable();
            $table->integer('ez_min_people')->nullable();
            $table->integer('ez_max_people')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_tours', function (Blueprint $table) {
            $table->dropColumn('ea_price');
            $table->dropColumn('ea_sale_price');
            $table->dropColumn('ea_duration');
            $table->dropColumn('ea_min_people');
            $table->dropColumn('ea_max_people');
            $table->dropColumn('ez_price');
            $table->dropColumn('ez_sale_price');
            $table->dropColumn('ez_duration');
            $table->dropColumn('ez_min_people');
            $table->dropColumn('ez_max_people');
        });
    }
}
