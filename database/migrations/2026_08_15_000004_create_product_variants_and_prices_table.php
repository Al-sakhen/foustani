<?php

declare(strict_types=1);

use App\Enums\ProductVariantStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('color_id')->constrained('colors')->restrictOnDelete();
            $table->foreignId('size_id')->constrained('sizes')->restrictOnDelete();
            $table->string('sku')->unique();
            $table->string('barcode')->nullable();
            $table->string('status')->default(ProductVariantStatus::ACTIVE->value);
            $table->unsignedInteger('weight_grams')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['product_id', 'color_id', 'size_id']);
            $table->index(['status', 'product_id']);
            $table->index('sku');
            $table->index('barcode');
            $table->index(['product_id', 'sort_order']);
        });

        Schema::create('variant_prices', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('product_variant_id')->constrained('product_variants')->cascadeOnDelete();
            $table->char('currency', 3);
            $table->unsignedBigInteger('amount');
            $table->unsignedBigInteger('compare_at_amount')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();

            $table->unique(['product_variant_id', 'currency']);
            $table->index(['product_variant_id', 'currency', 'starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('variant_prices');
        Schema::dropIfExists('product_variants');
    }
};
