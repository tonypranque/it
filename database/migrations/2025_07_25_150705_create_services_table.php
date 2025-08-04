<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('services', function (Blueprint $table) {
$table->id();
$table->string('title');
$table->string('slug')->unique();
$table->text('excerpt')->nullable(); // Краткое описание
$table->longText('content')->nullable(); // Полное описание
$table->foreignId('parent_id')->nullable()->constrained('services')->nullOnDelete();
$table->boolean('is_published')->default(true);
$table->integer('order')->default(0); // Для сортировки
$table->timestamps();
});
}

public function down(): void
{
Schema::dropIfExists('services');
}
};
