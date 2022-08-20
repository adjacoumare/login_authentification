<?php

namespace App\Http\Controllers;

use App\Models\Secretaire;
use App\Models\User;
use Illuminate\Http\Request;

class SecretaireController extends Controller
{
   //
   public function viewForm()
   {
       return view('secretaires.secretRegister');
   }

   public function registerSecret(Request $request)
   {
       //Ici nous allons definir les normes que doivent respectés nos differents champs
       $verification = $request->validate(
           [
               'nom' => ['required', 'string', 'max:100'],
               'prenom' => ['required', 'string', 'max:150'],
               'email' => ['required', 'string', 'max:150'],
               'telephone' => ['required', 'string', 'max:150'],
               'password' => ['required', 'string', 'min:8', 'max:20', 'confirmed'],
           ]
       );
       //Ici nous allons definir les actions à farire si la verification est bonne
       if ($verification)
       {
           //Nous allons creer un utilisateur avec les données saisis par l'utilisateur
           $user = User::create(
               [
                   'name' => $request['prenom'],
                   'email' => $request['email'],
                   'password' => bcrypt($request['password']),
                   'statut' => 'secretaire',
               ]
           );

           if($user)
           {
               $secretaire = Secretaire::create(
                   [
                       'nom' => $request['nom'],
                       'prenom' => $request['prenom'],
                       'email' => $request['email'],
                       'telephone' => $request['telephone'],
                       'password' => bcrypt($request['password']),
                       'userId' => $user->id,
                   ]
               );

               return redirect('/login');
           }
       }

   }
}


