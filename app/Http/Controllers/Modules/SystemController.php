<?php

namespace App\Http\Controllers\Modules;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modules.system.home');
    }

    /**
     * Show the authentication logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function authentication()
    {
        return view('modules.system.authentication');
    }

    /**
     * Show the security logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function security()
    {
        return view('modules.system.security');
    }

    /**
     * Show the nids logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function nids()
    {
        return view('modules.system.nids');
    }

    /**
     * Show the usb logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function usblogs()
    {
        return view('modules.system.usblogs');
    }

    /**
     * Show the change logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function changelogs()
    {
        return view('modules.system.changelogs');
    }

    /**
     * Show the vpn logs page
     *
     * @return \Illuminate\Http\Response
     */
    public function vpnlogs()
    {
        return view('modules.system.vpnlogs');
    }

    
}
