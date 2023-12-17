<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Session;
use Validator;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Position::orderBy('id', 'asc')->get();
        return view('position.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => ['required', 'string', 'max:255', 'unique:positions'],
            'min_salary' => ['required', 'numeric', 'min:0'],
            'max_salary' => ['required', 'numeric', 'min:0', 'gte:min_salary'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new Position;
        $data->job_title = $request->job_title;
        $data->min_salary = $request->min_salary;
        $data->max_salary = $request->max_salary;
        $data->save();

        Session::flash("notice", "Jabatan baru berhasil ditambahkan.");
        return redirect()->route("position.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Position::find($id);
        return view('position.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Position::find($id);
        return view('position.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => ['required', 'string', 'max:255'],
            'min_salary' => ['required', 'numeric', 'min:0'],
            'max_salary' => ['required', 'numeric', 'min:0', 'gte:min_salary'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Position::find($id);
        $data->job_title = $request->job_title;
        $data->min_salary = $request->min_salary;
        $data->max_salary = $request->max_salary;
        $data->save();

        Session::flash("notice", "Jabatan terpilih berhasil diubah..");
        return redirect()->route("position.show", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($position)
    {
        Position::destroy($position);
        Session::flash("notice", "Jabatan terpilih berhasil dihapus");
        return redirect()->route("position.index");
    }
}
