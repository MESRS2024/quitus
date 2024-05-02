<?php

namespace App\Http\Controllers;

use App\Jobs\PdfGeneration;
use App\Models\Student;
use App\Services\progresServices;
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
        session(['activeRole' => auth()->user()->getRoles()->first()->name]);

        $structure_id = (new progresServices())
                                     ->getStrecture(auth()->user()->idIndividu,
                                     auth()->user()->getRoles()->first()->name,
                                     auth()->user()->progres_token);
        if (!empty($response['structure_id'])) {
            session(['strecture_id' => $response['structure_id']]);
        }
        if (!empty($response['group_id'])) {
            session(['group_id' => $response['group_id']]);
        }


        return view('Home.home');
    }
}
