# Dress Store Database Foundation

## What I implemented

I created the foundational database and model layer for a production-ready e-commerce store specialized in selling dresses. The purpose was to establish a clean, maintainable schema with:

- dedicated customer authentication separate from the default Laravel users table,
- localized catalog fields in Arabic and English,
- typed Eloquent relationships,
- enums for statuses and business types,
- proper foreign keys and unique constraints,
- pricing and inventory logic using integer minor units,
- order/payment historical snapshots,
- simple lookup seeders.

The implementation follows the requirements you gave:

- only `ar` and `en` are supported,
- translations are stored directly as columns like `name_ar` and `name_en`,
- no JSON translation fields for normal catalog data,
- guest checkout is supported with nullable `customer_id`,
- order and financial records are protected from destructive cascade deletes,
- money is stored as integer minor units in `BIGINT`,
- inventory is derived as `on_hand - reserved` without an `available` column.

---

## Main database areas included

### 1. Customers and storefront auth

I added a dedicated `customers` table and a `Customer` model that extends `Authenticatable`.

Key fields:
- `public_id` as ULID
- `first_name`, `last_name`
- `email`, `phone` with uniqueness
- `password`, `preferred_locale`, `status`
- `email_verified_at`, `phone_verified_at`, `last_login_at`
- `remember_token`
- `softDeletes`

Relationships:
- `Customer hasMany Address`
- `Customer hasMany Cart`
- `Customer hasMany Order`
- `Customer hasMany WishlistItem`

This keeps storefront customer authentication separate from the default admin/user system.

### 2. Catalog and product structure

I implemented the catalog foundation with:
- `products`
- `product_variants`
- `sizes`
- `colors`
- `categories`
- `category_product`
- `collections`
- `collection_product`
- `facets`
- `facet_values`
- `product_facet_value`
- `product_media`

Important decisions:
- `products` store only the model/style itself,
- `product_variants` store every sellable color/size combination,
- size, color, stock and SKU are not stored directly on `products`.
- localized fields are used only where they make business sense.

### 3. Pricing and inventory

I added a production-ready pricing and stock foundation:
- `variant_prices`
- `inventory_locations`
- `inventory_items`
- `inventory_movements`
- `inventory_reservations`

Pricing rules:
- money stored in minor units as unsigned `BIGINT`,
- `currency` is a 3-letter code,
- unique index on `(product_variant_id, currency)`.

Inventory rules:
- tracked per variant and per location,
- `on_hand` and `reserved` are separate,
- available stock is calculated as `on_hand - reserved`,
- reservation lifecycle uses `active`, `converted`, `released`, and `expired` statuses.

### 4. Cart, orders, and historical snapshots

I implemented the checkout foundation with:
- `carts`
- `cart_items`
- `orders`
- `order_items`
- `order_addresses`
- `payments`
- `refunds`
- `refund_items`
- `shipments`
- `shipment_items`

This preserves historical order data by snapshotting product, size, color, price and address values into order tables, so later product edits do not break old transactions.

### 5. Promotions and wishlist

I added:
- `promotions`
- `coupons`
- `promotion_product`
- `promotion_category`
- `order_discounts`
- `wishlist_items`

This gives a simple promotion system without building a complex rules engine.

---

## Enums added

I created PHP-backed enums for the main domain statuses and types, including:

- `ProductStatus`
- `ProductVariantStatus`
- `CustomerStatus`
- `CartStatus`
- `OrderStatus`
- `PaymentStatus`
- `FulfillmentStatus`
- `InventoryMovementType`
- `InventoryReservationStatus`
- `ShipmentStatus`
- `RefundStatus`
- `PromotionType`
- `PromotionStatus`
- `MediaType`

These are used in model casts to keep data consistent and type-safe.

---

## Localization helper

I added the `HasLocalizedAttributes` trait so a model can resolve localized values from the active app locale.

Example:
- `$product->localized('name')`
- `$product->localized('description')`

This resolves:
- `name_ar` / `name_en`
- `description_ar` / `description_en`

and falls back to English if the locale is unsupported.

---

## Model relationships included

The model layer includes typed relationships for the main domain objects, such as:

- `Product hasMany ProductVariant`
- `Product belongsToMany Category`
- `Product belongsToMany Collection`
- `Product belongsToMany FacetValue`
- `Product hasMany ProductMedia`
- `ProductVariant belongsTo Product`
- `ProductVariant belongsTo Color`
- `ProductVariant belongsTo Size`
- `ProductVariant hasMany VariantPrice`
- `ProductVariant hasMany InventoryItem`
- `Customer hasMany Address`
- `Customer hasMany Cart`
- `Customer hasMany Order`
- `Customer hasMany WishlistItem`
- `Order hasMany OrderItem`
- `Order hasMany Payment`
- `Order hasMany Shipment`
- `Promotion hasMany Coupon`
- `Promotion belongsToMany Product`
- `Promotion belongsToMany Category`

All models use strict typing and proper typed return types.

---

## Important schema rules applied

I included the core production rules requested:

- ULID `public_id` columns where required
- unique constraints on `slug`, `sku`, `code`, and specific composite keys
- foreign keys with the correct delete behavior:
  - `cascadeOnDelete()` for parent catalog and cart data
  - `nullOnDelete()` for nullable references
  - `restrictOnDelete()` for financial and historical data
- compound indexes for filtering and lookup-heavy queries
- nullable `customer_id` on carts and orders so guest checkout works
- no cascade delete on order/payment/refund/historical records
- `softDeletes` only where appropriate

---

## Seeders included

Seeders were added for:
- `sizes`
- `colors`
- `inventory_locations`
- `facets`
- `facet_values`

These are idempotent and use `updateOrCreate()` so they can be safely run repeatedly.

---

## Files touched

The implementation was structured to fit the project’s Laravel app layout, including:

- `app/Enums/*`
- `app/Concerns/HasLocalizedAttributes.php`
- `app/Models/*`
- `database/migrations/*`
- `database/seeders/*`

---

## Final review

This is a clean non-overengineered foundation for a dress e-commerce store. It supports:

- localized catalog data,
- storefront customer auth separation,
- scalable product variation handling,
- safe inventory reservation design,
- historical order and payment data,
- stable foreign key and indexing rules,
- simple promotion setup.

This gives a solid base for later checkout, admin management, pricing rules, and storefront APIs without locking you into an overbuilt architecture.
