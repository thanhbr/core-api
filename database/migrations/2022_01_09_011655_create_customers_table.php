<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->smallInteger('user_id')->nullable();
            $table->smallInteger('shop_id')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('shop_code')->nullable();
            $table->string('shop_package')->nullable();
            $table->string('shop_expired')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->smallInteger('area')->nullable();
            $table->smallInteger('city_id')->nullable();
            $table->smallInteger('district_id')->nullable();
            $table->smallInteger('ward_id')->nullable();
            $table->smallInteger('business')->nullable();
            $table->smallInteger('origin_id')->nullable();
            $table->smallInteger('is_ordered')->nullable();
            $table->string('shipping_partner')->nullable();
            $table->datetime('registry_date')->nullable();
            $table->smallInteger('status')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
