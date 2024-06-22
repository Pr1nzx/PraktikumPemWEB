<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('gender')->nullable();
            $table->string('file_path')->nullable(); // tambahan untuk store
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
