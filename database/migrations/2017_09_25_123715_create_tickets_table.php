<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('Tid');
            $table->string('TicketID');
            $table->string('Title');
            $table->string('Status');
            $table->string('UserEmail');
            $table->string('Tech');
            $table->string('Priority');
            $table->string('Escalation');
            $table->foreign('TicketID')
                ->references('TicketCID')->on('ticket_comments')
                ->onDelete('cascade');

            $table->foreign('UserEmail')
                ->references('Email')->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
