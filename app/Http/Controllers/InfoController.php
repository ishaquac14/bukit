<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        $query = Info::orderBy('id', 'DESC');
    
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('author', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('date', 'LIKE', '%' . $searchTerm . '%');
            });
        }
    
        $infos = $query->paginate(10);
    
        return view('pages.info.index', compact('infos'));
    }   
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('pages.info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', // Kolom 'name' harus diisi
            'author' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);

        Info::create($request->all());
        return redirect()->route('info.index')->with('success', 'Information Add successfuly');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $info = Info::findOrFail($id);
        return view('pages.info.show', compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = Info::findOrFail($id);
        return view('pages.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info = Info::findOrFail($id);
        $info->update($request->all());
        return redirect()->route('info.index')->with('success', 'Information Updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $info = Info::findOrFail($id);
        $info->delete();
        return redirect()->route('info.index')->with('success', 'Information Deleted successfuly');
    }
}

