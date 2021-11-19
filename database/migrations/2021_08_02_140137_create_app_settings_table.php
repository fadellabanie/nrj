rush-hours-24-from<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('redio_live')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('mobile')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
        DB::table('app_settings')->insert([
            'redio_live' => 'url.com',
            'facebook' => 'facebook.com',
            'twitter' => 'twitter.com',
            'instagram' => 'instagram.com',
            'mobile' => '123123',
            'whats_app' => 'whats_app.com',
            'email' => 'info@ezdeal.com',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
}
