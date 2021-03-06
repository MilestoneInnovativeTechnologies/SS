<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFunctiondetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('functiondetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('code', '15')->nullable()->index();
            $table->string('abr', '15')->nullable();
            $table->string('display_name', '128')->nullable();
            $table->char('category', '15')->nullable()->index();
            $table->string('wtype', '30')->nullable()->index();
            $table->string('format', '30')->nullable()->default('[BR][FN]-[FY]-[AI]');
            $table->decimal('digit_length', 2,0)->default(4);
            $table->enum('direction', ['Out','In'])->default('Out');
            $table->char('default_account', '15')->nullable();
            $table->foreignNullable('pricelist', 'pricelist');
            $table->enum('tax', ['Yes','No'])->nullable()->default('No');
            $table->enum('taxselection', ['Tax01','Tax02','Select','Account','Auto'])->nullable()->default('Tax01');
            $table->enum('taxunique', ['Yes','No'])->nullable()->default('No');
            $table->enum('ratewithtax', ['Yes','No'])->nullable()->default('No');
            $table->enum('discount01', ['NotRequired','Amount','Percentage'])->nullable()->default('NotRequired');
            $table->enum('discount02', ['NotRequired','Amount','Percentage'])->nullable()->default('NotRequired');
            $table->enum('discount02base', ['Net','Gross'])->nullable()->default('Net');
            $table->enum('discount03', ['NotRequired','Amount','Percentage'])->nullable()->default('NotRequired');
            $table->enum('discountmode', ['None','PriceList','Custom','Buy_nX_Get_mY','Account','User','Branch'])->nullable()->default('None');
            $table->char('discount', '15')->nullable();
            $table->char('list', '15')->nullable()->default('01');
            $table->enum('shift_active', ['No','Yes'])->default('No');
            $table->enum('status', ['Active','Inactive'])->nullable()->default('Active');
            $table->audit();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('functiondetails');
    }
}
