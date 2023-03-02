<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('adresse');
            $table->string('code_postal', 6);
            $table->string('ville', 50);
            $table->timestamps();
            $table->boolean('validite');
            $table->foreignIdFor(\App\Models\User::class, 'id_user')
                ->OnUpdate('cascade')
                ->OnDelete('cascade')
                ->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('clients');
    }
};
