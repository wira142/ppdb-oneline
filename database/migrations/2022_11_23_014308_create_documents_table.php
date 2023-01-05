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
        Schema::create('documents', function (Blueprint $table) {
            $table->uuid('document_id')->default(DB::raw('(uuid())'))->primary();
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->text('certificate_front');
            $table->text('certificate_back');
            $table->text('birth_certificate');
            $table->text('name_school');
            $table->char('npsn', 8);
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
        Schema::dropIfExists('documents');
    }
};
