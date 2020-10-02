<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use illuminate\support;
use App\Employe;
// use App\Users;
// use Ap   p\Auth;
class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $employes = DB::table('services')
->join('employes','services.id','employes.service_id')
->get();
   Return response()->json($employes,200);
        ///avec id recup de data
        // $employes = Employe::find($id);
        // // dd($employes);
        // $service = $employes->service->first();
        // // dd($service);
        // Return response()->json($employes,200);
// $employes = DB::table('employes')
// ->join('services','employes.id_service','services.id_service')
// ->get();
// Return response()->json("wa returrrrrn",200);
        // $employes = \App\Employes::with('service')->find(1);
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


        $employes= Employe ::create([
            'service_id' => $request->service_id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'tel' => $request->tel,
            'email' => $request->email,
            'photo'=>$request->photo,
            'date_naissance' => $request->date_naissance,
            'daterecrutement' => $request->daterecrutement,
            'poste' => $request->poste,
            'user_id' => $request->user_id,
        

            ]) ;
            Return response()->json($employes) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $matricule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $users = DB::table('employes')
        //     ->join('services', 'employes.id', '=', 'services.id')
        //     ->select('employes.*', 'services.service')
        //     ->get();
        // $employes= Employe ::find($id);
        // Return response()->json($employes) ;
                // Return response()->json($employes,200);

    //    $employes = DB::table('employes')
    //     ->join('services','employes.id_service','services.id_service')
    //     ->where('employes.id', '=', $id);
    //         // $join->on('employes.id_service', '=', 'services.id_service')
    //         //      ->where('employes.id', '=', $id);

    //     // ->get();

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $matricule
     * @return \Illuminate\Http\Response
     */
    public function edit($matricule)
    {
//
    }
    public function total()
    {
        // $tot = DB::table('employes')->count();
        $count = Employe::all()->count();
        // $count = Employe::where('id','!=',0)->count();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $matricule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $matricule)
    {
        $employes = Employe::find($matricule)->update([
                'id_service' => $request->id_service,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'adresse' => $request->adresse,
                'tel' => $request->tel,
                'email' => $request->email,
                'date_naissance' => $request->date_naissance,
                'daterecrutement' => $request->daterecrutement,
                'photo'=>$request->photo,
                ]);
                Return response()->json($employes) ;
         ;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $matricule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $employes= Employe::find($id)->delete() ;
            Return response()->json($employes) ;
            // return $employes->toJson();
    }
    // public function destroy(Request $request, Employes $matricule){
    //     $employes = Employes::find($matricule);
    //     if(is_null($employes)){
    //     return response()->json(["message"=> "Record Not Found"],404);
    //     }
    //      $employes-> delete();
    //       return response()->json(null,204);
    //    }
    public function photo()
    {
    //  dd('test');
    $user=Auth::User();

    if($user->employe){
        return response()->json(['user'=>$user],200);

     } else {
         return response()->json(['warning'=>'not found'],203);
        };



     // $employe=$user->employe->get();
        //    Return response()->json($user,200);

    }



}
