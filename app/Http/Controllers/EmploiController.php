<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emploi;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class EmploiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $ordering=null)
    {
        //
        $ordering = $request->get('ordering');
        
        //expired 2 weeks ago
        //http://localhost:8000/?ordering=ago
        if ($ordering == 'ago') {
           $emplois = Emploi::where('language', 'EN')->where( 'created_at', '>', Carbon::now()->subDays(14))->paginate(25)->orderBy('created_at', 'asc');
           return view('emploi.index', ['emplois' => $emplois]);
           //return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }
        // will expire 2 weeks from now
        //http://localhost:8000/?ordering=from
        elseif ($ordering == 'from') {
           $emplois = Emploi::where('language', 'EN')->where( 'created_at', '>', Carbon::now()->addDays(14))->paginate(25)->orderBy('created_at', 'desc');
           return view('emploi.index', ['emplois' => $emplois]);
           //return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }else {
           $emplois = Emploi::where('language', 'EN')->Paginate(25);
           return view('emploi.index', ['emplois' => $emplois]);
           //return response()->json($emplois,200,[],JSON_PRETTY_PRINT);
        }
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
     * Display a Statistic page.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function showStatistics()
    {
        /*
        english = Job.objects.filter(language=self.language())
        #Grouup by date
        data = english.values('POSTDATE').annotate(dcount=Count('POSTDATE'))
        content = {}
        #I want the date in a UNIX TIME format
        for job in data:
            unix_time = time.mktime(job['POSTDATE'].timetuple())
            content.update({unix_time:job['dcount']})
        context['stats'] = content

        return context

        */

        return view('emploi.stats');
        //return response()->json('Statistics' ,200,[],JSON_PRETTY_PRINT);
    }

    /**
     * Display a Statistic page AJAX call.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStatisticsJSON(Request $request, $annee=null, $mois=null, $jour=null)
    {
        //
        $annee = $request->get('annee');
        $mois = $request->get('mois');
        $jour = $request->get('jour');
        $emplois = Emploi::whereYear('created_at', '=', $annee)
              ->whereMonth('created_at', '=', $mois)
              ->whereDay('created_at', '=', $jour)
              ->get();
        return response()->json(emplois ,200,[],JSON_PRETTY_PRINT);
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
}
