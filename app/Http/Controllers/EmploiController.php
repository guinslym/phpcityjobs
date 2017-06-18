<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emploi;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Input;
date_default_timezone_set('America/Montreal');

class EmploiController extends Controller
{


    /**
     * Display a Statistic page.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function showStatistics()
    {
        $job_post_date = Emploi::where('language', 'EN')->pluck('POSTDATE');
        $unix_time = array();

        for ($i=0; $i < count($job_post_date) ; $i++) { 
            $unix_time[$i] = strtotime($job_post_date[$i]);
        }

        $job_post_regular = array();
        for ($i=0; $i < count($job_post_date) ; $i++) { 
            $job_post_regular[$i] = $job_post_date[$i];
        }

        $datas = array_count_values($unix_time);
        $datas = json_encode($datas);
        
        $regular_time_zone = array_count_values($job_post_regular);
        $regular_time_zone = json_encode($regular_time_zone);

        return view('emploi.stats', ['datas' => $datas, 'regular_time_zone' => $regular_time_zone]);
    }


    /**
     * Display a Statistic page AJAX call.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStatisticsJSON(Request $request, $annee=null, $mois=null, $jour=null)
    {

        //
        //DB::enableQueryLog();

        $annee = $request->get('annee');
        //\Log::info($annee);
        $mois = $request->get('mois');
        //\Log::info($mois);
        $jour = $request->get('jour');
        //\Log::info($jour);
        $emplois = Emploi::where('language', 'EN')->whereYear('POSTDATE', '=', $annee)->whereMonth('POSTDATE', '=', $mois)->whereDay('POSTDATE', '=', $jour)->get();
        
        //var_dump($emplois, DB::getQueryLog());
        return response()->json($emplois ,200,[],JSON_PRETTY_PRINT);
        //return $emplois;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

           //DB::enableQueryLog();
           $emplois = Emploi::where('language', 'EN')->orderBy('EXPIRYDATE', 'asc')->Paginate(25);
           //var_dump($emplois, DB::getQueryLog());
           return view('emploi.index', ['emplois' => $emplois]);
           //return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function post_2_weeks_ago(Request $request)
    {
        //
        $emplois = Emploi::where('language', 'EN')->where( 'POSTDATE', '>', Carbon::now()->subDays(14))->orderBy('EXPIRYDATE', 'asc')->paginate(25);
           return view('emploi.index', ['emplois' => $emplois]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function expire_in_2_weeks_from_now(Request $request)
    {
        //
        $date_now = Carbon::now();
        $date_in_2_weeks = Carbon::now()->addDays(14);

        $emplois = Emploi::where('language', 'EN')->whereBetween( 'EXPIRYDATE', [$date_now, $date_in_2_weeks])->orderBy('EXPIRYDATE', 'asc')->paginate(25);
           return view('emploi.index', ['emplois' => $emplois]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * http://localhost:8000/emploi/show/3
     */
    public function show($id)
    {
        //
        $emploi = Emploi::findOrFail($id);
        return view('emploi.show', ['emploi' => $emploi]);
        //return response()->json($emploi,200,[],JSON_PRETTY_PRINT);
    }


    /**
     * Display an About page.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function aboutPage()
    {
        //
        return view('emploi.about');
        //return response()->json('About page' ,200,[],JSON_PRETTY_PRINT);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $searchkey = $request->get('searchkey');
        $keyword = Input::get('searchKey', '');
        $emplois = Emploi::where('language', 'EN')->SearchByKeyword($keyword)->get();
        return view('emploi.search', ['emplois' => $emplois ]);
        //return 0;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        //
        $emplois = Emploi::all();
        return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update_and_tweets(Request $request, $passcode=null)
    {
        $passcode = $request->get('passcode');
        if ($passcode == '2HT7*pV6JJps7$PfLXd2KM7vzdj!Ztd*a6NRWsPvnmTnSr'){
            \Log::info('the passcode is correct');

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

            //Get the language "EN", 'FR'
            $jobref = isset($emplois[$i]->JOBREF) ? $emplois[$i]->JOBREF   : ' ';
            $job_language = explode("-", $jobref)[2];

            $jobref_found = Emploi::where('JOBREF', '=', $jobref)->first();

            if($jobref_found == null ){
                \Log::info('inserting a Job to the db');

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

                }else{
                    //nothing
                }//end if jobref found


            }//end for loop for jobs

        }//end of looping through each language_url

            return 'Correct';
        }else{
            return 'not correct';
        }
    }//end function update_and_tweets()


}
