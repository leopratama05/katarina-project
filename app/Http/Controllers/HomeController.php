<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $name = User::with(['name']);
        $user = User::select()->count();
        $activity_log = ActivityLog::with('user')->latest()->limit(10)->orderBy('id','DESC')->get();

        if ($request->get('name')) {
            $nama = $request->name;
            $name->whereHas(
                'name', 
                function($query) use ($nama){
                    $query->where('name', 'LIKE', "%{$nama}%");
                }
            );
        }
        if ($request->get('keyword')) {
            $name->search($request->keyword);
        } 

        return view('home', compact('user', 'activity_log', 'name'));
    }
}
