<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    //tampilin data
    public function index(){
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    //pindah ke halaman create
    public function create(){
        return view('employees.create');
    }

    //buat masukin ke database pas udah di create page
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:20',
            'address' => 'required|min:10|max:40',
            'age' => 'required|integer|min:21',
            'number' => 'required|min:9|max:12|regex:/^08[0-9]+$/',
            'image' => 'image',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('image', 'public');
        }

        Employee::create($data);
        return redirect()->route('employees.index');
    }

    // show
    public function show(Employee $employee){
        return view('employees.show', compact('employee'));
    }

    //pindah ke halaman edit
    public function edit(Employee $employee){
        return view('employees.edit', compact('employee'));
    }

    //update database
    public function update(Request $request, Employee $employee){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'age' => 'required',
            'number' => 'required',
            'image' => 'image',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete('public/'.$employee->image);
            $data['image'] = $request->file('image')->store('image', 'public');
        }

        $employee->update($data);
        
        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        Storage::delete('public/'.$employee->image);
        return redirect()->route('employees.index');
    }
}
