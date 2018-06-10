<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id')->unsigned();
            $table->string('php_versions_url')->nullable();
            $table->boolean('is_shared_host')->nullable();
            $table->string('latest_patch_version')->nullable();
            $table->string('default_php_version')->nullable();
            $table->enum('patch_policy', ['host', 'user']);
            $table->boolean('manual_update_major_minor')->nullable();
            $table->boolean('is_confirmed')->nullable();
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
        Schema::dropIfExists('host_events');
    }
}
