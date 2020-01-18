<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryAdvertismentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_advertisments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('time')->default(7);
            $table->unsignedInteger('sort')->default(1);
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('advertismen_id');
            $table->foreign('advertismen_id')->references('id')->on('advertisments')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('category_value_id');
            $table->foreign('category_value_id')->references('id')->on('category_values')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->text('updates');
            $table->softDeletes();
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
        Schema::dropIfExists('category_advertisments');
    }
}
