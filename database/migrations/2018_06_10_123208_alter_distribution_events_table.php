<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDistributionEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribution_events', function (Blueprint $table) {
            $table->string('distro')->after('distribution_id')->nullable();
            $table->string('package_url')->after('distro')->nullable();
            $table->string('family')->after('package_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distribution_events', function (Blueprint $table) {
            //
        });
    }
}
