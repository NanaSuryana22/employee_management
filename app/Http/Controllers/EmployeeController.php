<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Employee::orderBy('id', 'asc')->get();
        return view('employee.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('employee.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $image = $request->file('image');
        $dp_image = 'photo_pegawai/';
        $image_name = Str::random(6).'_'.$image->getClientOriginalName();
        $image->move($dp_image, $image_name);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        $pegawai = new Employee;
        $pegawai->user_id = $user->id;
        if ($request->hasFile('image')) {
            $pegawai->image = $dp_image . $image_name;
        }
        $pegawai->phone_number = $request->phone_number;
        $pegawai->hire_date = $request->hire_date;
        $pegawai->position_id = $request->position_id;
        $pegawai->department_id = $request->department_id;
        $pegawai->gender = $request->gender;
        $pegawai->save();

        Session::flash("notice", "Employee baru berhasil ditambahkan.");
        return redirect()->route("employee.show", $pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Employee::find($id);
        if (empty($request->file('image'))) {
            $image_n = $pegawai->image;
        }
        else {
            $image = $request->file('image');
            $dp_image = 'photo_pegawai/';
            $image_name = Str::random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
            $image_n = $dp_image . $image_name;
        }

        $pegawai->user->name = $request->name;
        $pegawai->user->email = $request->email;
        $pegawai->image = $image_n;
        $pegawai->phone_number = $request->phone_number;
        $pegawai->hire_date = $request->hire_date;
        $pegawai->position_id = $request->position_id;
        $pegawai->department_id = $request->department_id;
        $pegawai->gender = $request->gender;
        $pegawai->save();

        Session::flash("notice", "Pegawai terpilih berhasil diubah.");
        return redirect()->route("pegawai.show", $pegawai);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        Employee::destroy($employee);
        Session::flash("notice", "employee terpilih berhasil dihapus");
        return redirect()->route("employee.index");
    }
}
