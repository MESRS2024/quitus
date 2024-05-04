<?php

namespace App\Http\Controllers;

use App\Jobs\PdfGeneration;
use App\Models\Student;
use App\Services\progresServices;
use App\Services\statsService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // adding the strecture from progres API
        //session(['strecture_id' => 1]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if empty active role and empty saved roles then redirect to the login page with the message no role for you.
        if(empty(session('activeRole')) && empty(auth()->user()->getRoles()->first())){
            auth()->logout();
            return redirect()->route('login')->withErrors(['email' => 'You don\'t have any role in the system. Please contact the administrator.']);
        }
        if(empty(session('activeRole'))){
            session(['activeRole' => auth()->user()->getRoles()->first()->name]);
        }else{
            session(['activeRole' => session('activeRole')]);
        }
        $structure_id = (new progresServices())
            ->getStrecture(auth()->user()->idIndividu,
                auth()->user()->getRoles()->first()->name, auth()->user()->progres_token);
        if (!empty($response['structure_id'])) {
            session(['strecture_id' => $response['structure_id']]);
        }
        if (!empty($response['group_id'])) {
            session(['group_id' => $response['group_id']]);
        }

        $stats = (new statsService())->getStats();

        return view('Home.home', ['stats'=>$stats]);
    }
}
