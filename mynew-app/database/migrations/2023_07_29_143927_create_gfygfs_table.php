<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void
    {
        Schema::create('gfygfs', function (Blueprint $table) {
            $table->id();
$table->string('fn');
$table->string('ln');
$table->integer('age');
$table->string('sex');
$table->string('pass');
$table->integer('userid');
$table->softDeletes();
$table->timestamps();//
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gfygfs');
    }
};
