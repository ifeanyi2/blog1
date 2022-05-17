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
        Schema::create('livetv', function (Blueprint $table) {
            $table->id();
            $table->text('emded_code')->nullabe();
            $table->integer('user_id')->nullabe();
            $table->integer('status')->nullable();
            $table->integer('view_count')->nullable()->default('0');
            $table->integer('likes')->nullable()->default('0');
            $table->integer('dislikes')->nullable()->default('0');
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
        Schema::dropIfExists('livetv');
    }
};
