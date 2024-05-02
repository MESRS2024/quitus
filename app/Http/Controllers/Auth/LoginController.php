<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\progresServices;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use jeremykenedy\LaravelRoles\Models\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.create');
    }

    public function login(Request $request)
    {
        //write a method de connect via external api
        $Url = "https://progres.mesrs.dz/api/authentication/v1/";
        $data = [
            'username' => $request->email,
            'password' => $request->password
        ];
        $progresServices = new progresServices();
        $result = $progresServices->getAuth($data);
        if($result->failed())
        {
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }
        if ($result->ok()) {
            $response = $result->json();
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->update([
                    'progres_token' => $response['token'],
                    'expired_at' => $response['expirationDate'],
                    'progres_id' => $response['userId'],
                    'uuid' => $response['uuid'],
                    'idIndividu' => $response['idIndividu'],
                    'etablissement_id' => $response['etablissementId'],
                ]);
            }
            else{
                $user = User::create([
                    'name' => $response['userName'],
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'progres_token' => $response['token'],
                    'expired_at' => $response['expirationDate'],
                    'progres_id' => $response['userId'],
                    'uuid' => $response['uuid'],
                    'idIndividu' => $response['idIndividu'],
                    'etablissement_id' => $response['etablissementId'],
                ]);
            }

            //dd($user);
            $roles = $progresServices->getRoles($response['idIndividu'], $response['token']);
            $user->name_en=$user->name = $roles->json()[0]['nomLtIndividu'].' '. $roles->json()[0]['prenomLtIndividu'];
            $user->save();
            $roles = collect($roles->json());
            $idRoles = [];
            foreach ($roles as $role) {
                $id = Role::where('name', $role['roleCode'])->first()?->id;
                ($id) ? array_push($idRoles, $id) : null;
            }
            $user->roles()->sync($idRoles);
            auth()->login($user);
            return redirect()->route('home');
        }
        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }


}
