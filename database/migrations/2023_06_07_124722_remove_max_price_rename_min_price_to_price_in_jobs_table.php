<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMaxPriceRenameMinPriceToPriceInJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('max_price');
            $table->renameColumn('min_price', 'price');
        });
    }

    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->integer('max_price');
            $table->renameColumn('price', 'min_price');
        });
    }
};
