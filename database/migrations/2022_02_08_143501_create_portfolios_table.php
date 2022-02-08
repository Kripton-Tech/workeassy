<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('portfolios', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('category_id')->nullable()->unsigned();
        //     $table->string('title')->nullable();
        //     $table->string('image')->nullable();
        //     $table->enum('status', ['active', 'inactive'])->default('active');
        //     $table->timestamps();
        //     $table->integer('created_by')->nullable();
        //     $table->integer('updated_by')->nullable();

        //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('portfolios');
    }
}
