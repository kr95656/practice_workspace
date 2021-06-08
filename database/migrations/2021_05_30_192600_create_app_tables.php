<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_tables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

        });

        Schema::create('primary_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->integer('sort_no');

        });

        Schema::create('secondary_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->integer('sort_no');

            // // 外部キー（子カテゴリ）
            // $table->unsignedBigInteger('primary_category_id');

            // $table->foreign('primary_category_id')->references('id')->on('primary_categories');
        });

        Schema::create('item_conditions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->integer('sort_no');
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel');
            $table->string('prefecture');
            $table->string('city');
            $table->string('street');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel');
            $table->string('prefecture');
            $table->string('city');
            $table->string('street');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar_file_name')->nullable();
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('price')->nullable(); //符号なし
            $table->timestamps();

            // 外部キー
            $table->unsignedBigInteger('secondary_category_id')->nullable();
            $table->unsignedBigInteger('item_condition_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            // 子カテゴリ(secondary_category)
            $table->unsignedBigInteger('primary_category_id')->nullable();

            $table->foreign('secondary_category_id')->references('id')->on('secondary_categories');
            $table->foreign('item_condition_id')->references('id')->on('item_conditions');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('customer_id')->references('id')->on('customers');

            // 子カテゴリ(secondary_category)
            $table->foreign('primary_category_id')->references('id')->on('primary_categories');

            // $table->id();
            // $table->string('name');
            // $table->unsignedInteger('price'); //符号なし
            // $table->timestamps();

            // // 外部キー
            // $table->unsignedBigInteger('secondary_category_id');
            // $table->unsignedBigInteger('item_condition_id');
            // $table->unsignedBigInteger('employee_id');
            // $table->unsignedBigInteger('customer_id');

            // $table->foreign('secondary_category_id')->references('id')->on('secondary_categories');
            // $table->foreign('item_condition_id')->references('id')->on('item_conditions');
            // $table->foreign('employee_id')->references('id')->on('employees');
            // $table->foreign('customer_id')->references('id')->on('customers');

        });

        Schema::create('item_cages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('item_quantity');
            $table->timestamps();

            // 外部キー
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('customer_id');

            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('customer_id')->references('id')->on('customers');

        });


        Schema::create('employees_customers', function (Blueprint $table) {
            $table->id();
            $table->string('log');
            $table->timestamps();

            // 外部キー
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('customer_id');

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('customer_id')->references('id')->on('customers');

        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_price'); //符号なし
            $table->timestamps();

            // 外部キー
            $table->unsignedBigInteger('customer_id');

            $table->foreign('customer_id')->references('id')->on('customers');

        });

        Schema::create('items_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_price'); //符号なし
            $table->unsignedInteger('detail_serial_number'); //符号なし
            $table->timestamps();

            // 外部キー
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_id')->references('id')->on('items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_tables');
        Schema::dropIfExists('items_orders');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('item_cages');
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_conditions');
        Schema::dropIfExists('employees_customers');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('secondary_categories');
        Schema::dropIfExists('primary_categories');

    }
}
