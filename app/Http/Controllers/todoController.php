<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class todoController extends Controller
{
    // public function ok()
    // {
    //     $tasks = auth()->user();
    //     return view('home.home', compact('tasks'));
    // }

    public function add()
    {
        $user_id = auth()->user()->id;

        $data = DB::table('task')
            ->where('user_id', $user_id)
            ->paginate();

        return view('/home.tambah', ['data' => $data]);
    }

    public function add_todo(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required'
        ]);
        DB::table('task')->insert([
            'judul' => $request->judul,
            'user_id' => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s')

        ]);
        return redirect('/dashboard');
    }
    public function edit($id)
    {
        $data = DB::table('task')->where('id', $id)->get();
        return view('home.edit', ['data' => $data]);
    }
    public function update(Request $request)
    {
        DB::table('task')
            ->where('id', $request->id)
            ->update(
                [
                    'judul' => $request->judul,
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        return redirect('/dashboard');
    }
    public function hapus($id)
    {
        DB::table('task')->where('id', $id)->delete();
        return redirect('tambah')->with('berhasil dihapus');
    }
}