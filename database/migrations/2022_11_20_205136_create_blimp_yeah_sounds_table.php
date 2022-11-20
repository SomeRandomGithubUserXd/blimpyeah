<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('blimp_yeah_sounds', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_active")->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blimp_yeah_sounds');
    }
};
