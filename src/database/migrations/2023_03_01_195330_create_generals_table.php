<?php

use App\Models\General;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\App;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('locale')->nullable();
            $table->string('company_id')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_input')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
        });

        General::create([
            'locale' => App::currentLocale(),
            'company' => 'Fietsverhuur Julianadorp',
            'address' => 'Loopuytpark 22',
            'zipcode' => '1787AE',
            'city' => 'Julianadorp',
            'phone_input' => '+31223692673',
            'phone' => '+31(0)223-692673',
            'email' => 'info@fietsverhuurjulianadorp.nl',
            'facebook',
            'instagram',
            'twitter'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
