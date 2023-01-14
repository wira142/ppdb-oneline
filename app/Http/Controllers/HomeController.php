<?php

namespace App\Http\Controllers;

use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $schools = School::get();
        $province = json_decode(file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/provinsi'),true);
        
        foreach ($schools as $key => $school) {
            $school->province = $province['provinsi'][array_search($school->province,array_column($province['provinsi'],'id'))]['nama'];
            
            $city = json_decode(file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kota/'.$school->city),true);

            $school->city = $city['nama'];
        }
        return view('index', ['page' => 'home', 'schools'=>$schools]);
    }
}
