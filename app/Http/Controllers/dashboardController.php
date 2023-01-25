<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function dashboard()
    {
        $user_id = auth()->user()->id;

        $data = DB::table('task')
            ->where('user_id', $user_id)
            ->paginate(10);

        return view('home.dashboard', ['data' => $data]);
    }
    public function find(Request $request)
    {
        $cari = $request->cari;
        $userId = Auth::id();

        $data = DB::table('task')
            ->where('judul', 'like', "%" . $cari . "%")
            ->where('user_id', $userId)
            ->paginate(10);

        return view('home.dashboard', ['data' => $data]);
    }
}

    // public function find(Request $request)
    // {


    //     $cari = $request->cari;

    //     $data = DB::table('task')
    //         ->where('judul', 'like', "%" . $cari . "%")
    //         ->paginate(10);

    //     return view('home.dashboard', ['data' => $data]);
    // }   
        // if (Auth::check()) {

        //     $data = task::where('judul', 'like', "%" . $request->cari . "%")
        //         ->get();
                // ->paginate();
        //     return view('home.tambah', ['data' => $data]);
        // } else {
        //     return redirect()->route('tambah');
        // }
        // $request = auth()->user()->id;