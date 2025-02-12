<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('in_kind_donations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('region')->nullable();
            $table->string('postal_code');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->string('country_code');
            $table->text('description');
            $table->decimal('estimated_value', 10, 2);
            $table->date('date');
            $table->string('category');
            $table->boolean('anonymous_donation')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('in_kind_donations');
    }
};
