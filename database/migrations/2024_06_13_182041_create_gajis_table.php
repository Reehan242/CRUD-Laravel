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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('gaji_pokok',12,2);
            $table->decimal('bonus',12,2);
            $table->decimal('gaji_kotor',12,2);
            $table->decimal('potongan',12,2);
            $table->decimal('gaji_total',12,2);
            $table->date('tgl_gajian');
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
        Schema::dropIfExists('gajis');
    }
};
