<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->uuid('form_id')->default('(uuid())')->primary();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->text('poster');
            $table->text('title');
            $table->enum('degree', ['SD', 'SMP', 'SMA/SMK']);
            $table->text('description');
            $table->dateTime('time_expired');
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
        Schema::dropIfExists('registration_forms');
    }
};
