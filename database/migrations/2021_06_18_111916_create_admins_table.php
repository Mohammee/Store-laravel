<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('role_id')
                ->constrained('roles')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->string('email')->unique();
            $table->boolean('active')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->boolean('status')->default(1);
            $table->string('avatar')->nullable();
            $table->timestamp('lastActivity')->default(now());
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
        Schema::dropIfExists('admins');
    }
}
