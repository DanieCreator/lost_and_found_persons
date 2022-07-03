<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('officer_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('station_id')
                ->nullable()->constrained()->onDelete('cascade');
            $table->string('person_name');
            $table->string('person_national_identification_number')->nullable();
            $table->string('person_birth_certificate_number')->nullable();
            $table->string('person_passport_number')->nullable();
            $table->string('person_phone_number')->nullable();
            $table->json('extra_items')->nullable();
            $table->date('person_date_of_birth');
            $table->datetime('last_seen');
            $table->string('last_seen_place');
            $table->json('last_seen_with')->nullable();
            $table->boolean('solved')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('reports');
    }
}
