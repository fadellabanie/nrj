<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->id();
            $table->string('device_id')->nullable();
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('email')->unique();
            $table->timestamp('verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('type')->nullable();
            $table->text('remember_token')->nullable();
            $table->text('device_token')->nullable();
            $table->timestamps();
        });

         DB::table('users')->insert([
             'name' => 'fadellabanie',
             'mobile' => '011315200',
             'email' => 'admin@admin.com',
             'password' => Hash::make('12345678'),
             'type' => 'admin',
             'created_at' => now(),
         ]);
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
