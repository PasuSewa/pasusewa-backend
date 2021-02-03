<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_codes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');

            // this 3 are nullable because the user may have one, or the other, but most likely won't have all 3 at the same time
            $table->string('unique_security_code', 250)->nullable(); // only 1 security code
            $table->string('multiple_security_code', 250)->nullable(); // 10+ security codes
            $table->text('crypto_currency_access_code')->nullable(); // the 27 words used to acces a crypto wallet
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('security_codes', function(BluePrint $table){
            $table->dropForeign(['slot_id']);
            $table->dropColumn('slot_id');
        });

        Schema::dropIfExists('security_codes');
    }
}