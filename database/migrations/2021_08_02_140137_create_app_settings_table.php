<?php

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
            $table->longText('about_us')->nullable();
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
            'about_us' => 'NRJ Radio Egypt. You Can listen to all of your favorite artists, Find all your favorite shows. Share on Facebook your favorite hits. NRJ Egypt 92.1',
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
