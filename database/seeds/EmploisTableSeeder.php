<?php

use Illuminate\Database\Seeder;

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
        
        Emploi::insert(
            array(
                    array('name' => 'admin'),
                    array('name' => 'user'),
                    array('name' => 'moderator'),                                
            ));
        
    }
}

/*
ini_set("allow_url_fopen", 1);
$json = file_get_contents('http://www.ottawacityjobs.ca/fr/data/');
$obj = json_decode($json);


$fp = fopen('jobs-fr-june-4.json', 'w');
fwrite($fp, json_encode($obj));
fclose($fp);

*/