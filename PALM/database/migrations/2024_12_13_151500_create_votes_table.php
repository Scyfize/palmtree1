<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Foreign key to posts table
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->smallInteger('vote'); // 1 for upvote, -1 for downvote
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
