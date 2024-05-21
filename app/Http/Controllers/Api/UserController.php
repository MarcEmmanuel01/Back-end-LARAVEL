<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function informationuser(InformationUser $request)
    {
       $user = new User ();

       $user -> name_user = $request -> name_user;
       $user -> email_user = $request -> email_user;
       $user -> password_user = $request -> password_user;
       $user -> save ();
      }

      // Mettre à jour un utilisateur
    public function updateuser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->name_user = $request->input('name_user');
        $user->email_user = $request->input('email_user');
        if ($request->has('password_user')) {
            $user->password_user = bcrypt($request->input('password_user')); // Assurez-vous de hasher le mot de passe
        }

        $user->save();

        return response()->json(['message' => 'Utilisateur mis à jour avec succès'], 200);
    }

    // Supprimer un utilisateur
    public function deleteuser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Utilisateur supprimé avec succès'], 200);
    }

        // Ajout de la nouvelle méthode pour récupérer les informations d'un utilisateur par son ID
        public function recup_info_user($id)
        {
            $user = User::find($id);
            if ($user) {
                return response()->json($user);
            } else {
                return response()->json(['message' => 'Utilisateur non trouvé'], 404);
            }
        }
}




