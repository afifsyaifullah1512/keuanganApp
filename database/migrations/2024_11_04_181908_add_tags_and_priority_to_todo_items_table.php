<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->json('tags')->nullable();
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        });
    }

    public function down()
    {
        Schema::table('todo_items', function (Blueprint $table) {
            $table->dropColumn(['tags', 'priority']);
        });
    }
};