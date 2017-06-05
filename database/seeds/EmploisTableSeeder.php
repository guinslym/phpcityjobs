<?php

use Illuminate\Database\Seeder;
use App\Emploi;

function arr_get($array, $key, $default = null){
    return isset($array[$key]) ? $array[$key] : $default;
}
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
        //factory(App\Emploi::class, 50)->create();
        $json = file_get_contents('http://www.ottawacityjobs.ca/en/data/');
        $emplois = json_decode($json);
        $emplois = $emplois->jobs;
        //count($emplois) => 81


        use App\Emploi;
        $emp = Emploi::create($array['order']);
        $emp = Emploi::create($emplois);

foreach ($emplois as $key => $value) {
    # code...
    dd($key);
}

        for ($i = 0; $i < count($emplois); $i++) {
            //print_r($emplois[$i]->JOBREF);

            Emploi::insert(
                array(
array('JOBURL' => isset($emplois[$i]->JOBURL) ? $emplois[$i]->JOBURL   : ' '),
array('SALARYMAX' => isset($emplois[$i]->SALARYMAX)?  $emplois[$i]->SALARYMAX  : ' ' ),
array('SALARYMIN' => isset($emplois[$i]->SALARYMIN)?   $emplois[$i]->SALARYMIN : ' ' ),
array('SALARYTYPE' => isset($emplois[$i]->SALARYTYPE)? $emplois[$i]->SALARYTYPE : ' ' ),
array('NAME' => isset($emplois[$i]->NAME)? $emplois[$i]->NAME : ' ' ),
array('POSITION' => isset($emplois[$i]->POSITION)? $emplois[$i]->POSITION : ' ' ),
array('JOBREF' => isset($emplois[$i]->JOBREF) ? $emplois[$i]->JOBREF : ' '),
array('JOB_SUMMARY' => isset($emplois[$i]->JOB_SUMMARY) ? $emplois[$i]->JOB_SUMMARY : ' '),
array('POSTDATE' => isset($emplois[$i]->POSTDATE) ? $emplois[$i]->POSTDATE : ' '),
array('EXPIRYDATE' => isset($emplois[$i]->EXPIRYDATE)? $emplois[$i]->EXPIRYDATE : ' ' ),
array('KNOWLEDGE' => isset($emplois[$i]->KNOWLEDGE) ? $emplois[$i]->KNOWLEDGE : ' '),
array('LANGUAGE_CERTIFICATES' => isset($emplois[$i]->LANGUAGE_CERTIFICATES) ?  $emplois[$i]->LANGUAGE_CERTIFICATES : ' ' ),
array('EDUCATIONANDEXP' => isset($emplois[$i]->EDUCATIONANDEXP) ? $emplois[$i]->EDUCATIONANDEXP : ' ' ),
array('COMPANY_DESC' => isset( $emplois[$i]->COMPANY_DESC) ? $emplois[$i]->COMPANY_DESC   : ' '),
                
                ));




}
        
    }//end
}




/*
ini_set("allow_url_fopen", 1);
$json = file_get_contents('http://www.ottawacityjobs.ca/en/data/');
$obj = json_decode($json);
$obj = $obj->jobs;


$fp = fopen('jobs.json', 'w');
fwrite($fp, json_encode($obj, JSON_PRETTY_PRINT));
fclose($fp);




[
    {
        "var1": "9",
        "var2": "16",
        "var3": "16"
    },
    {
        "var1": "8",
        "var2": "15",
        "var3": "15"
    }
]

$json  = '[{"var1":"9","var2":"16","var3":"16"},{"var1":"8","var2":"15","var3":"15"}]';
$data = json_decode($json);
var_dump($data[0]['var1']);
*/