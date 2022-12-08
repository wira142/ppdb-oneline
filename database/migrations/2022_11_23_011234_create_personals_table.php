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
        Schema::create('personals', function (Blueprint $table) {
            $table->uuid('personal_id')->default('(uuid())')->primary();
            // $table->uuid('id')
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->string('image');
            $table->char('nisn', 10);
            $table->char('nik', 16);
            $table->char('phone', 16);
            $table->enum('religion', ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu']);
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->date('birthday');
            $table->text('birthplace');
            $table->text('address');
            $table->text('village');
            $table->text('district');
            $table->text('city');
            $table->text('province');
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
        Schema::dropIfExists('personals');
    }
};
