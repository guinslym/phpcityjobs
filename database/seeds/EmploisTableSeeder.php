<?php


function arr_get($array, $key, $default = null){
    return isset($array[$key]) ? $array[$key] : $default;
}

use Illuminate\Database\Seeder;
use App\Emploi;
use Carbon\Carbon;
class EmploisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     *php artisan db:seed --class=EmploisTableSeeder
     */
    public function run()
    {
        //
        $languages = array('http://www.ottawacityjobs.ca/en/data/', 'http://www.ottawacityjobs.ca/fr/data/');


        //Looping through each language
        foreach ($languages as $language_url ) {
           //print_r($language_url);
           //print_r("\n");

        
        $json = file_get_contents($language_url);
        $emplois = json_decode($json);
        $emplois = $emplois->jobs;


        //Looping through 90 json objects (jobs)
        for ($i = 0; $i < count($emplois); $i++) {
            //print_r($emplois[$i]->JOBREF);
            //print_r("\n");

            //Get the language "EN", 'FR'
            $jobref = isset($emplois[$i]->JOBREF) ? $emplois[$i]->JOBREF   : ' ';
            $job_language = explode("-", $jobref)[2];

            Emploi::insert(
                array(

'JOBURL' => isset($emplois[$i]->JOBURL) ? $emplois[$i]->JOBURL   : ' ',
'SALARYMAX' => isset($emplois[$i]->SALARYMAX)?  $emplois[$i]->SALARYMAX  : ' ' ,
'SALARYMIN' => isset($emplois[$i]->SALARYMIN)?   $emplois[$i]->SALARYMIN : ' ' ,
'SALARYTYPE' => isset($emplois[$i]->SALARYTYPE)? $emplois[$i]->SALARYTYPE : ' ' ,
'NAME' => isset($emplois[$i]->NAME)? $emplois[$i]->NAME : ' ' ,
'POSITION' => isset($emplois[$i]->POSITION)? $emplois[$i]->POSITION : ' ' ,
'JOBREF' => isset($emplois[$i]->JOBREF) ? $emplois[$i]->JOBREF : ' ',
'JOB_SUMMARY' => isset($emplois[$i]->JOB_SUMMARY) ? $emplois[$i]->JOB_SUMMARY : ' ',

'POSTDATE' => isset($emplois[$i]->POSTDATE) ? Carbon::parse($emplois[$i]->POSTDATE) : ' ',
'EXPIRYDATE' => isset($emplois[$i]->EXPIRYDATE)? Carbon::parse($emplois[$i]->EXPIRYDATE) : ' ' ,
'KNOWLEDGE' => isset($emplois[$i]->KNOWLEDGE) ? $emplois[$i]->KNOWLEDGE : ' ',
'LANGUAGE_CERTIFICATES' => isset($emplois[$i]->LANGUAGE_CERTIFICATES) ?  $emplois[$i]->LANGUAGE_CERTIFICATES : ' ' ,
'EDUCATIONANDEXP' => isset($emplois[$i]->EDUCATIONANDEXP) ? $emplois[$i]->EDUCATIONANDEXP : ' ' ,
'COMPANY_DESC' => isset( $emplois[$i]->COMPANY_DESC) ? $emplois[$i]->COMPANY_DESC   : ' ',
 'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
 'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
 'language' => $job_language,
                

                    )//end array
                );//end Emploi::insert
            }
                //print_r(dd($emplois));

        }//end of looping through each language_url


        
    }//end run function
}// end class EmploiTableSeeder

