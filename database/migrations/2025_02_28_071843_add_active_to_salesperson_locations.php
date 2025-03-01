<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('salesperson_locations', function (Blueprint $table) {
            $table->boolean('active')->default(true);
        });
    }

    public function down() {
        Schema::table('salesperson_locations', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
};
