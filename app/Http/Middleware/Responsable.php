<?php

namespace App\Http\Middleware;

use Closure;
use App\Employe;
use Illuminate\Support\Facades\Auth;

class Responsable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user=Auth::User();
// return response()->json(['success'=>$user], 200);

        // dd($request->user_id);
        // $user=User::Find($request->user_id);
        // $employes=$user->employe->get();
        // dd($employes);
        if($user->employe){
            return $next($request);
        }else{
            return response()->json('not employe',200);

        }
        // if($user->etat == 1){
        //     return $next($request);
        //   }



        //     return response()->json('not responsable',200);


    }
}
