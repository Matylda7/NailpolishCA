<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // this method defines the changes that will be made when the migration is run
    public function up(): void
    {
        //creates a new table
        Schema::create('nailpolishes', function (Blueprint $table) {
            $table->id();//auto incrementing primary key
            $table->string('name');
            $table->text('description')->nullable(); //nullable means it can be empty
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    //down method defines changes to be made when a migraton is rolled back
    public function down(): void
    {
        Schema::dropIfExists('nailpolishes');// deletes table if it exists
    }
};
