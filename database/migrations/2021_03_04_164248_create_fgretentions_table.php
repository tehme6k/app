<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFgretentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fgretentions', function (Blueprint $table) {
            $table->id();
            $table->integer('box_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('lot');
            $table->date('lab_date');
            $table->date('exp_date');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fgretentions');
    }
}
