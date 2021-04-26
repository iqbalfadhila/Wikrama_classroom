<?php

namespace App\Http\Controllers;

use App\Majors;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors = Majors::latest()->paginate(5);

        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.majors.create');
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
            'majors' => 'required'
        ]);

        Majors::create([
            'majors' => $request->majors
        ]);

        return redirect(route('admin.majors.index'))->withSuccess('Majors create successfully!');
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
    public function edit(Majors $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Majors $major)
    {
        $this->validate($request, [
            'majors' => 'required'
        ]);

        $major->update($request->all());

        return redirect(route('admin.majors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Majors $major)
    {
        $major->delete();

        return redirect()->route('admin.majors.index')
                        ->with('success', 'Majors delete Successfully');
    }
}
