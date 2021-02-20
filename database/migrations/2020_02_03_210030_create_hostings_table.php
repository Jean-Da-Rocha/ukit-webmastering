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
        Schema::create('hostings', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name');
            $table->date('renewal_date');
            $table->boolean('domain_managing');
            $table->string('registrar')->nullable();
            $table->decimal('pricing');
            $table->text('comment')->nullable();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('billing_status_id')->constrained('billing_status')->cascadeOnDelete();
            $table->foreignId('server_id')->nullable()->constrained()->cascadeOnDelete();
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
            $table->dropForeign(['billing_status_id']);
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['project_id']);
            $table->dropForeign(['server_id']);
        });

        Schema::dropIfExists('hostings');
    }
}
