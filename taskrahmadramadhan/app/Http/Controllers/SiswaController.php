<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
   
    public function index()
    {
        $siswas = Siswa::selectRaw("
        siswas.*,
        users.name as created_by_name
    ")->join('users', 'users.id', 'siswas.created_by')
    ->orderBy('created_at', 'DESC')
    ->get();

return view('siswas.index',compact('siswas'));
    }
    public function create()
    {
        return view('siswas.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'nama' => 'required',
            'alamat' => 'required',
            'wali' => 'required',
            'ket' => 'required',
        ])->validate();

        Siswa::create([
            'created_by' => auth()->id(),   
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'wali' => $request->wali,
            'ket' => $request->ket,
        ]);
    
        return redirect()->route('siswas')->with('success', 'Siswa add successfully');
    }

   
    public function show(string $id)
    {
        $siswa = Siswa::selectRaw("
                siswas.*,
                users.name as created_by_name
            ")->join('users', 'users.id', 'siswas.created_by')
            ->orderBy('created_at', 'DESC')
            ->findOrFail($id);

        return view('siswas.show', compact('siswa'));
    }

    
    public function edit(string $id)
    {
       $siswa = Siswa::findOrFail($id);
       return view('siswas.edit', compact('siswa'));
    }

    
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'nama' => 'required',
            'alamat' => 'required',
            'wali' => 'required',
            'ket' => 'required',
        ])->validate();

        $siswa = Siswa::findOrFail($id);
        
        if($siswa){
            $siswa->update([
                'created_by' => auth()->id(),
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'wali' => $request->wali,
                'ket' => $request->ket,
            ]);
        }
        return redirect()->route('siswas')->with('success', 'Siswa updated susccessfully');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('siswas')->with('success', 'Siswa deleted susccessfully');
    }
}
