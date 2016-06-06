<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysInCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table-> unsignedInteger ('user_id')->nullable();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table-> unsignedInteger ('blog_id')->nullable();
            $table->foreign('blog_id')
            ->references('id')->on('posts')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('blog_id');
        });
    }
}
