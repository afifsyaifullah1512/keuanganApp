<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('user_id');
        });

        // Berikan nilai default untuk category_id yang sudah ada
        // Asumsikan ada setidaknya satu kategori di tabel categories
        $defaultCategoryId = DB::table('categories')->first()->id ?? null;
        
        if ($defaultCategoryId) {
            DB::table('transactions')->whereNull('category_id')->update(['category_id' => $defaultCategoryId]);
        }

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};