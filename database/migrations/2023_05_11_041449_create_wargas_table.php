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
        schema::create('warga',function (Blueprint $table){
            $table->id();
            $table->char('NIK')->unique();
            $table->string('Nama');
            $table->string('TTL');
            $table->string('JK');
            $table->string('Gol_Darah');
            $table->string('Alamat');
            $table->char('Rt/Rw');
            $table->string('Kel/Desa');
            $table->string('Kecamatan');
            $table->text('Agama');
            $table->text('Status_Perkawinan');
            $table->text('Pekerjaan');
            $table->text('Kewarganegaraan');
            $table->softDeletes();
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
        Schema::dropIfExists('wargas');
    }
};
