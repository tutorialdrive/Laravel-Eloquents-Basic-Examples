<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentboardRecordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('studentboard_records', function (Blueprint $table) {
            $table->unsignedInteger('id')->index()->autoIncrement();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('priority_id');
            $table->unsignedInteger('college_id');
            $table->text('attachments')->nullable();
            $table->string('posted_by');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();


            $table->foreign('college_id')
                ->references('id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('priority_id')
                ->references('id')->on('priorities')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('college_id')
                ->references('id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('studentboard_records');
    }
}
