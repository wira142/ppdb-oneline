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
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->uuid('form_id')->default(DB::raw('(uuid())'))->primary();
            $table->foreignUuid('school_id')->references('school_id')->on('schools');
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
