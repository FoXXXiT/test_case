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
    public function up(): void
    {
        Schema::table('loaned_books', function (Blueprint $table) {
            $table->foreign('book_article_id')
                ->references('id')
                ->on('book_articles')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('book_articles', function (Blueprint $table) {
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('loaned_books', function (Blueprint $table) {
            $table->dropForeign('book_article_id_foreign');
            $table->dropForeign('user_id_foreign');
        });

        Schema::table('book_articles', function (Blueprint $table) {
            $table->dropForeign('book_id_foreign');
        });
    }
};
