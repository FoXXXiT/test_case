<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('loaned_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_article_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('borrow_start')
                  ->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->timestamp('borrow_end');
            $table->boolean('return_deadline_passed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
       Schema::dropIfExists('loaned_books');
    }
};
