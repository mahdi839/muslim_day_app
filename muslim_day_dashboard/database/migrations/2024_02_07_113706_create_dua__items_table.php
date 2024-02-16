<?php

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
        Schema::create('dua__items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dua_category_id');
            $table->foreign('dua_category_id')->references('id')->on('dua_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('dua_item_title_en')->nullable();
            $table->string('dua_item_title_bn');
            $table->string('subtitle_bn');
            $table->string('subtitle_en')->nullable();
            $table->longText('dua_item_row_html');
            $table->string('sanad_en')->nullable();
            $table->string('sanad_bn');
            $table->string('matan_en')->nullable();
            $table->string('matan_bn');
            $table->string('arabic_dua');
            $table->string('translation_en')->nullable();
            $table->string('translation_bn');
            $table->string('reference_en')->nullable();
            $table->string('reference_bn');
            $table->string('explanation');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dua__items');
    }
};
