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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('product_code', 20)->nullable();
            $table->string('product_name', 30)->unique();
            $table->decimal('product_price', 12, 2);
            $table->text('product_image')->nullable();
            $table->integer('product_active')->default(0);
           
            $table->foreignId('product_created_by')
            ->nullable()
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
          
            $table->foreignId('product_modified_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->integer('product_delete')->default(0);
            $table->timestamp('product_created_at');
            $table->timestamp('product_modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};








