<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("liga_id");
            $table->string("nama");
            $table->integer("harga")->default(135000);
            $table->integer("harga_nameset")->default(25000);
            $table->boolean("is_ready")->default(true);
            $table->string("jenis")->default("Replika Ori Top Quality");
            $table->string("berat")->default(0.30);
            $table->string("gambar");
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
        Schema::dropIfExists('products');
    }
}
