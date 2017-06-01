<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
@python_2_unicode_compatible
class Description(models.Model):
    '''
    Job.Description.models
    '''
    def __str__(self):
        return self.COMPANY_DESC

    jobs = models.ForeignKey(Job, on_delete=models.CASCADE)

**/
class CreateDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('descriptions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('emploi_id')->unsigned()->nullable();
            $table->foreign('emploi_id')->references('id')->on('emplois');
            $table->longText('KNOWLEDGE')->nullable();
            $table->longText('LANGUAGE_CERTIFICATES')->nullable();
            $table->longText('EDUCATIONANDEXP')->nullable();
            $table->longText('COMPANY_DESC')->nullable();
            $table->dateTimeTz('POSTDATE')->nullable();
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
        //
        Schema::drop('descriptions');
    }
}
