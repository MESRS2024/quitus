<?php

namespace App\Http\Controllers;

use App\Jobs\PdfGeneration;
use App\Models\academicYear;
use App\Models\Student;
use App\Services\progresServices;
use App\Services\statsService;
use Illuminate\Http\Request;
use Session;

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
        if(empty(session('activeAcademicYear'))){
            session(['activeAcademicYear' => academicYear::where('is_active', 1)->first()->id]);
        }else{
            session(['activeAcademicYear' => session('activeAcademicYear')]);
        }
        $structure_id = (new progresServices())
            ->getStrecture(auth()->user()->idIndividu,
                session('activeRole'),
                auth()->user()->progres_token);

        session(['strecture_id' => $structure_id['structure_id']]);
        session(['group_id' => $structure_id['group_id']]);



        $stats = (new statsService())->getStats();

        return view('Home.home', ['stats'=>$stats]);
    }
}
