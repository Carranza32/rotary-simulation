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
        Schema::create('rotary_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('current_step')->default(1);
            $table->foreignId('user_id')->nullable()->constrained('users');
            //Step 1
            $table->string('project_name');
            $table->text('type')->nullable();
            $table->longText('contacts')->nullable();

            //Step 2
            $table->longText('local_members')->nullable();
            $table->longText('international_members')->nullable();
            $table->boolean('members_conflict')->nullable();

            //Step 3
            $table->text('objectives')->nullable();

            //Step 4
            $table->text('interest_area')->nullable();

            //Step 5
            $table->text('interest_area_goals')->nullable();
            $table->longText('measures')->nullable();
            $table->boolean('evaluation')->nullable();

            //Step 6
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            //Step 7
            $table->longText('organizers')->nullable();
            $table->text('members')->nullable();
            $table->text('travellers')->nullable();
            $table->text('local_sponsors')->nullable();
            $table->text('international_sponsors')->nullable();

            //Step 8
            $table->string('currency')->nullable();
            $table->string('exchange_rate')->nullable();
            $table->longText('headings')->nullable();
            $table->decimal('budget_step8')->nullable();

            //Step 9
            $table->longText('sources')->nullable();
            $table->decimal('world_donation')->nullable();
            $table->decimal('total_contributions')->nullable();
            $table->decimal('total_financed')->nullable();
            $table->decimal('total_budget')->nullable();

            //Step 10

            $table->softDeletes();
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
        Schema::dropIfExists('rotary_forms');
    }
};
