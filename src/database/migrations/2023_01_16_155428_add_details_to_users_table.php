<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('host')->nullable();
            $table->string('locale')->nullable();
            $table->string('sex')->nullable();
            $table->string('initials')->nullable();
            $table->string('lastname')->nullable();
            $table->string('firstnames')->nullable();
            $table->string('nameInsertion')->nullable();
            $table->string('company')->nullable();
            $table->string('companyNr')->nullable();
            $table->string('taxNr')->nullable();
            $table->string('address')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('addressSuffix')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable()->default('nl');
            $table->string('state')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthcity')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('bsn')->nullable();
            $table->string('iban')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->dateTime('lastLogin')->nullable();
            $table->string('code')->nullable();
            $table->integer('pid')->nullable();
            $table->tinyInteger('admin')->default(0);
            $table->tinyInteger('developer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropColumn('locale');
            $table->dropColumn('sex');
            $table->dropColumn('initials');
            $table->dropColumn('lastname');
            $table->dropColumn('firstnames');
            $table->dropColumn('nameInsertion');
            $table->dropColumn('company');
            $table->dropColumn('companyNr');
            $table->dropColumn('taxNr');
            $table->dropColumn('address');
            $table->dropColumn('housenumber');
            $table->dropColumn('addressSuffix');
            $table->dropColumn('zipcode');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('state');
            $table->dropColumn('birthdate');
            $table->dropColumn('birthcity');
            $table->dropColumn('phone');
            $table->dropColumn('phone2');
            $table->dropColumn('bsn');
            $table->dropColumn('iban');
            $table->dropColumn('maritalStatus');
            $table->dropColumn('lastLogin');
            $table->dropColumn('code');
            $table->dropColumn('pid');
        });
    }
};
