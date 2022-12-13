<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->uuid('mother_id')->default(DB::raw('(uuid())'))->primary();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->string('name', 100);
            $table->char('nik', 16);
            $table->enum('study', ['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3']);
            $table->text('job');
            $table->integer('salary');
            $table->char('phone', 16);
            $table->enum('status', ['Hidup', 'Mati']);
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
        Schema::dropIfExists('mothers');
    }
};
