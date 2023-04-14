<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rapat', 191);
            $table->string('acara_rapat', 191);
            $table->string('peserta_rapat', 191);
            $table->boolean('is_selesai')->default(0);
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
        Schema::dropIfExists('rapats');
    }
}
