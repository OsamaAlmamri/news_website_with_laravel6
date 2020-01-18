<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            $table->string('title');
            $table->text('introduction');
            $table->text('editor');
            $table->unsignedInteger('sort')->default(1);
            $table->boolean('status')->default(true);
            $table->boolean('has_comment')->default(true);
            $table->timestamp('publish_at')->default(now());
            $table->string('categories',255);

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('deleted_by')->nullable()->default(null);
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->text('updates');

//            $table->unsignedBigInteger('updated_by')->nullable()->default(null);
//            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('news');
    }
}
