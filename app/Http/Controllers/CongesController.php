<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\JsonabletoJson;

use App\Conge;
use App\Employe;
use App\Typeconge;


class CongesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

$conges=Conge::all();
// return response()->json(['success'=>$conges],200);

        // $conges = DB::table('conges')
        $conges = Conge::where([
        //     ['conges.val', '<>', 'V'],
        //  ['conges.val', '<>', 'A'],
         ['conges.val', '=', Null],
        ])->get();
        foreach ($conges as $conge) {

            $employes=$conge->employe->get();
        }

        foreach ($conges as $conge) {
            $typeconge=$conge->typeconge->get();
        }

        return response()->json(['conges'=>$conges],200);

 //////'conges' on donne le nom qu'on veut

    //         ->join('typeconges','typeconges.id','conges.typeconge_id')
    //     ->join('employes','employes.id','conges.employe_id')
    //     ->where('conges.val', '=', 'V');
    //     ////
    //     // ->join('typesconges','conges.employe_id','typeconges.id')
    //     // ->select('*')
    //     // ->paginate(6);///
    // })

    //     ->get();

        // $conges=paginate(5);
           Return response()->json($conges,200);
        // $conges= Conge::all(); //ici variable $contact recoit data  //sans oublier de specifier use App\Contact, ou utiliser fillable
        // Return response()->json($conges,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conges=Conge::create([
            'typeconge_id' => $request->typeconge_id,
            'employe_id' => $request->employe_id,
            'date_demande' => $request->date_demande,
            'date_depart' => $request->date_depart,
            'date_retour' => $request->date_retour,
            ]) ;
            Return response()->json($conges) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    public function filtrer()
    {
        $conges = Conge::all();
        foreach ($conges as $conge) {

            $employes=$conge->employe->get();
        }

        foreach ($conges as $conge) {
            $typeconge=$conge->typeconge->get();
        }

        return response()->json(['conges'=>$conges],200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $conge=Conge::find($id)->update([
            'val' => $request->val,
            ]);
            Return response()->json($conge) ;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
