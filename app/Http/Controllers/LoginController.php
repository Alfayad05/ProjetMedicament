<?php

namespace App\Http\Controllers;

use App\dao\ServiceLogin;
use Illuminate\Support\Facades\Session;
use Request;
//use App\metier\Visiteur;
class LoginController extends Controller
{
    public function getLogin() {
        try {
            $erreur = "";
            return view ('vues/formLogin', compact('erreur'));
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/formLogin', compact('erreur'));
        }
    }

    public function signIn() {
        try {
            $login = Request::input('login');
            $pwd = Request::input('pwd');
            $unVisiteur = new ServiceLogin();
            $connected = $unVisiteur->login($login, $pwd);

            if ($connected) {
                if (Session::get('type') === 'P') {
                    return view('vues/connected');
                } else {
                    return view('vues/connected');
                }
            } else {
                $erreur = "Login ou mot de passe inconnu";
                return view('vues/formLogin', compact('erreur'));
            }
        } catch (MonException $e) {
            $monErreur = $e->getMessage();
            return view('vues/formLogin', compact('monErreur')); // au lieu de 'Vues/formLogin'
        } catch (Exception $e) {
            $monErreur = $e->getMessage();
            return view('vues/formLogin', compact('monErreur')); // au lieu de 'Vues/formLogin'
        }
    }

    public function signOut() {
        $unVisiteur = new ServiceLogin();
        $unVisiteur->logout();
        return view('home');
    }
}
