<?php

namespace App\Http\Controllers;

use App\Majors;
use App\Rayon;
use App\Supervisor;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = Rayon::latest()->paginate(5);

        return view('admin.rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Supervisor $supervisor)
    {
        $supervisor = Supervisor::orderBy('name', 'ASC')->get();
        return view('admin.rayon.create', compact('supervisor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rayon' => 'required',
            'supervisor_id' => 'required'
        ]);

        Rayon::create([
            'rayon' => $request->rayon,
            'supervisor_id' => $request->supervisor_id
        ]);

        return redirect(route('admin.rayon.index'))->withSuccess('Rayon Create Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon, Supervisor $supervisor)
    {
        $supervisor = Supervisor::orderBy('name', 'ASC')->get();
        return view('admin.rayon.edit', compact('rayon', 'supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rayon $rayon)
    {
        $this->validate($request, [
            'rayon' => 'required',
            'supervisor_id' => 'required'
        ]);

        $rayon->update($request->all());

        return redirect(route('admin.rayon.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('admin.rayon.index')
            ->with('success', 'Rayon delete successfully');
    }
}
