<?php

declare(strict_types=1);

use App\Enums\ProductStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table): void {
            $table->id();
            $table->ulid('public_id')->unique();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('slug_ar')->unique();
            $table->string('slug_en')->unique();
            $table->string('short_description_ar')->nullable();
            $table->string('short_description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->string('seo_title_ar')->nullable();
            $table->string('seo_title_en')->nullable();
            $table->text('seo_description_ar')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->string('status')->default(ProductStatus::DRAFT->value);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
            $table->index('slug_ar');
            $table->index('slug_en');
        });

        Schema::create('category_product', function (Blueprint $table): void {
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->primary(['category_id', 'product_id']);
            $table->index(['category_id', 'sort_order']);
            $table->index(['product_id', 'sort_order']);
        });

        Schema::create('collection_product', function (Blueprint $table): void {
            $table->foreignId('collection_id')->constrained('collections')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->primary(['collection_id', 'product_id']);
            $table->index(['collection_id', 'sort_order']);
            $table->index(['product_id', 'sort_order']);
        });

        Schema::create('product_facet_value', function (Blueprint $table): void {
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->foreignId('facet_value_id')->constrained('facet_values')->cascadeOnDelete();
            $table->timestamps();

            $table->primary(['product_id', 'facet_value_id']);
            $table->index('product_id');
            $table->index('facet_value_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_facet_value');
        Schema::dropIfExists('collection_product');
        Schema::dropIfExists('category_product');
        Schema::dropIfExists('products');
    }
};
