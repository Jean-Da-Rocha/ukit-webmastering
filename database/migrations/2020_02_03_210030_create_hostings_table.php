<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostings', static function (Blueprint $table) {
            $table->id();
            $table->string('domain_name', 255);
            $table->date('date_renewal');
            $table->boolean('domain_managing');
            $table->string('registrar', 255)->nullable();
            $table->decimal('price');
            $table->text('comment')->nullable();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->constrained()->nullable()->cascadeOnDelete();
            $table->foreignId('status_id')->constrained()->cascadeOnDelete();
            $table->foreignId('server_id')->constrained()->nullable()->cascadeOnDelete();
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
        Schema::table('hostings', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['project_id']);
            $table->dropForeign(['server_id']);
        });

        Schema::dropIfExists('hostings');
    }
}
