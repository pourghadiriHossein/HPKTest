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
        Schema::create('digital_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('digital_content_type_id')->nullable();

            $table->string('name');
            $table->text('description')->nullable();
            $table->text('image_url')->nullable();
            $table->text('content_url')->nullable();

            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);

            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('digital_content_type_id')
                ->references('id')
                ->on('digital_content_types')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('digital_contents');
    }
};
