<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->string('sku')->unique()->after('name');
            $table->string('category')->after('sku');
            $table->text('description')->nullable()->after('category');
            $table->integer('stock')->default(0)->after('price');
            $table->boolean('is_active')->default(true)->after('stock');
        });
    }

    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sku', 'category', 'description', 'stock', 'is_active']);
        });
    }
};

