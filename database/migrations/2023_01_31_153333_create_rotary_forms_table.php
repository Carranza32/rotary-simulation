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
            $table->longText('measures52')->nullable();
            $table->longText('measures53')->nullable();
            $table->longText('measures54')->nullable();
            $table->longText('measures55')->nullable();
            $table->longText('measures56')->nullable();
            $table->longText('measures57')->nullable();
            $table->longText('monitoring_51')->nullable();
            $table->longText('monitoring_52')->nullable();
            $table->longText('monitoring_53')->nullable();
            $table->longText('monitoring_54')->nullable();
            $table->longText('monitoring_55')->nullable();
            $table->longText('monitoring_56')->nullable();
            $table->longText('monitoring_57')->nullable();
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
            $table->boolean('has_interes_conflict')->nullable();
            $table->text('colaboration_org')->nullable();

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
            $table->text('necesities')->nullable();
            $table->text('necesities_process')->nullable();
            $table->text('participants1')->nullable();
            $table->text('participants2')->nullable();

            $table->boolean('coo_work')->nullable();
            $table->text('capacitation')->nullable();
            $table->text('determinate_necesities')->nullable();
            $table->text('incentives')->nullable();
            $table->text('supervisors_names')->nullable();

            $table->boolean('use_providers')->nullable();
            $table->boolean('use_tender')->nullable();
            $table->boolean('has_conflict_providers')->nullable();

            $table->text('equipment_included')->nullable();
            $table->text('equipment_maintenance')->nullable();
            $table->boolean('use_founds')->nullable();
            $table->text('completed_proyect')->nullable();

            $table->boolean('has_microcredit')->nullable();
            $table->boolean('has_local_founds')->nullable();
            $table->text('generate_income')->nullable();
            $table->text('activities')->nullable();

            //Step 11 documents
            $table->text('files')->nullable();

            //Step 12
            $table->text('primary_contact_authorization')->nullable();
            $table->text('district_committee_authorization')->nullable();
            $table->text('fdd_authorization')->nullable();
            $table->text('legal_agreement')->nullable();


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
