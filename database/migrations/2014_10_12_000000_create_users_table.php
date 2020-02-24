<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('username')->unique()->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->string('photo')->nullable();
            $table->integer('xp')->default(0);

            $table->enum('profile', ['public', 'private'])->default('public');

            $table->enum('status', ['enable', 'disable', 'register'])->default('enable');
            $table->string('provider')->default('web');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('verification_token')->nullable();
            
            $table->string('plan')->nullable();
            $table->timestamp('end_suscription_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
