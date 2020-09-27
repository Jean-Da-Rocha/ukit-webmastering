<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_name', 255);
            $table->text('task_description');
            $table->string('link', 255)->nullable();
            $table->time('task_duration');
            $table->date('task_starting_date');
            $table->boolean('quoted')->default(0);
            $table->string('quotation_ref', 100)->nullable();
            $table->boolean('billed')->default(0);
            $table->string('bill_num', 100)->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
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
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['project_id']);
        });

        Schema::dropIfExists('tasks');
    }
}
