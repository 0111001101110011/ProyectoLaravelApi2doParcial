<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /** 
     * Show the admin's dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard ()
    {
                // view( directory.file )
        return view('admin.dashboard');
    }





}
