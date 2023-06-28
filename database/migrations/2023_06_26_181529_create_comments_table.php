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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // foreignIdFor() - 모델 클래스에 대해 "모델클래스명_id" UNSIGNED BIGINT 컬럼을 추가한다
            $table->foreignIdFor(\App\Models\User::class)
                ->constrained() // 외래키 제약조건
                ->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Comment::class, 'parent_id')
                ->nullable()
                ->constrained('comments') // 외래키 제약조건
                ->cascadeOnDelete();
            $table->morphs('commentable');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
