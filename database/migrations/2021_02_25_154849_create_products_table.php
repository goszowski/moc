<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->boolean('is_active');
            $table->boolean('is_archived');
            $table->decimal('min_sum', 8, 2);
            $table->decimal('max_sum', 8, 2);
            $table->unsignedTinyInteger('min_term');
            $table->unsignedTinyInteger('max_term');
            $table->decimal('percent_per_day', 4, 2);
            $table->decimal('penalty_per_day', 4, 2);
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
        Schema::dropIfExists('products');
    }
}
