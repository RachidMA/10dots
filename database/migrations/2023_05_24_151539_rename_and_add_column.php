<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            //We need to rename the price_range column to min_price
            //and add max_price column

            //1)Rename the price_range column to min_price
            $table->renameColumn('price_range', 'min_price');

            //2)Add max_price after min_price column
            $table->string('max_price')->after('price_range');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            //Revert the chages if needed
            $table->removeColumn('min_price', 'price_range');
            $table->dropColumn('max_price');
        });
    }
};
