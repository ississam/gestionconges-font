<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\API;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public $successStatus = 200;
/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        // $var=3;
        // return response()->json($var,200);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            if($user->employe){
            return response()->json(['success' => $success,'user' => $user,'employe' => "oui"], $this-> successStatus);


            }else{
            return response()->json(['success' => $success,'user' => $user,'employe' => "non"], $this-> successStatus);



            }
            // return response()->json(['success' => $success,'user' => $user], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // return response()->json(['error'=>'$validator->errors()'], 401);


              $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            // 'etat' => 0,
        ]);
if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
$input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // $user->etat=0;
        // $user->save();
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
return response()->json(['success'=>$success], $this-> successStatus);
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }

}
