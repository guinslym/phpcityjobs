<?php

use Illuminate\Database\Seeder;
use App\Emploi;
class EmploisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //factory(App\Emploi::class, 50)->create();
        $json = file_get_contents('http://www.ottawacityjobs.ca/en/data/');
        $emplois = json_decode($json);

        foreach ($emplois as $item) {
            Emploi::insert(
                array(
                    array('JOBURL' => $item->JOBURL ),
                    array('SALARYMAX' => $item->SALARYMAX ),
                    array('SALARYMIN' => $item->SALARYMIN ),
                    array('SALARYTYPE' => $item->SALARYTYPE ),
                    array('NAME' => $item->NAME ),
                    array('POSITION' => $item->POSITION ),
                    array('JOBREF' => $item->JOBREF ),
                    array('JOB_SUMMARY' => $item->JOB_SUMMARY ),
                    array('POSTDATE' => $item->POSTDATE ),
                    array('EXPIRYDATE' => $item->EXPIRYDATE ),
                    array('KNOWLEDGE' => $item->KNOWLEDGE ),
                    array('LANGUAGE_CERTIFICATES' => $item->LANGUAGE_CERTIFICATES ),
                    array('EDUCATIONANDEXP' => $item->EDUCATIONANDEXP ),
                    array('COMPANY_DESC' => $item->COMPANY_DESC ),
                ));
        }//end foreach
        
    }//end
}

/*
ini_set("allow_url_fopen", 1);
$json = file_get_contents('http://www.ottawacityjobs.ca/fr/data/');
$obj = json_decode($json);


$fp = fopen('jobs-fr-june-4.json', 'w');
fwrite($fp, json_encode($obj));
fclose($fp);

*/