<?php

use App\Models\Comic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('img')->nullable();
            $table->enum('status', [Comic::ELABORACIÓN, Comic::REVISIÓN, Comic::PUBLICADO])->default(Comic::ELABORACIÓN);
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('profile_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
