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
        Schema::create('tbl_tiket', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('no_hp');
            $table->string('ticket_id')->unique();
            $table->boolean('is_checked_in')->default(false);
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
        Schema::dropIfExists('tbl_tiket');
    }
};
