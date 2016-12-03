<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIstormRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agencies', function(Blueprint $table) {
			$table->foreign('approver_id')
				->references('id')
				->on('users');
		});

		Schema::table('users', function(Blueprint $table) {
			$table->foreign('agency_id')
				->references('id')
				->on('agencies');
		});

		Schema::table('products', function(Blueprint $table) {
			$table->foreign('user_id')
				->references('id')
				->on('users');

			$table->foreign('agency_id')
				->references('id')
				->on('agencies')
				->onDelete('cascade');

			$table->foreign('type_id')
				->references('id')
				->on('types');
		});

		Schema::table('orders', function(Blueprint $table) {

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade');
		});

		Schema::table('order_product', function(Blueprint $table) {

			$table->foreign('approver_id')
				->references('id')
				->on('users');

			$table->foreign('product_id')
				->references('id')
				->on('products');

			$table->foreign('order_id')
				->references('id')
				->on('orders')
				->onDelete('cascade');
		});

		Schema::table('detail_product', function(Blueprint $table) {

			$table->foreign('product_id')
				->references('id')
				->on('products')
				->onDelete('cascade');

			$table->foreign('detail_id')
				->references('id')
				->on('details')
				->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_agency_id_foreign');
		});

		Schema::table('orders', function(Blueprint $table) {

			$table->dropForeign('orders_user_id_foreign');
		});

		Schema::table('products', function(Blueprint $table) {
			$table->dropForeign('products_user_id_foreign');
			$table->dropForeign('products_type_id_foreign');
		});

		Schema::table('order_product', function(Blueprint $table) {
			$table->dropForeign('order_product_approver_id_foreign');
			$table->dropForeign('order_product_product_id_foreign');
			$table->dropForeign('order_product_order_id_foreign');
		});

		Schema::table('detail_product', function(Blueprint $table) {
			$table->dropForeign('detail_product_product_id_foreign');
			$table->dropForeign('detail_product_detail_id_foreign');
		});
    }
}
