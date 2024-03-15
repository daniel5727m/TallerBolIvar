<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
    
    public function updatePasswordReset(Request $request){
       
        $rules = [
            'password' => 'required|confirmed|min:6|max:18|regex:`^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$`',
        ];
        
        $messages = [
            'password.required' => 'El campo es requerido',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'El mínimo permitido son 6 caracteres',
            'password.regex' => 'Se debe usar por lo menos una letra mayúscula, una letra minúscula y un número',
            'password.max' => 'El máximo permitido son 18 caracteres',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('password/reset/'.$request->token.'?email='.$request->email)->withErrors($validator);
        }
        else{
           
                $user = new User;
                $user->where('email', '=', $request->email)
                     ->update(['password' =>bcrypt($request->password)]);
                return redirect('/')->with('message', 'Contraseña cambiada con éxito, ingrese con su nueva contraseña');
            
        }
    }
}
