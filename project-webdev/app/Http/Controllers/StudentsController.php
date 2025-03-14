<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function myWelcomeView()
    {
        $students = Students::all();
        $users = User::all();
        return view('welcome', compact('students', 'users'));
    }
 
    public function createNewStd(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|numeric',
            'gender' => 'required|max:6',
            'address' => 'required'
        ]);

        $addNew = new Students();
        $addNew->name = $request->name;
        $addNew->age = $request->age;
        $addNew->gender = $request->gender;
        $addNew->address = $request->address;
        $addNew->save();

        return back()->with('success', 'Student added successfully!');
    }

    // Update Student Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|numeric',
            'gender' => 'required|string|max:6',
            'address' => 'required|string',
        ]);

        $student = Students::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'address' => $request->address,
        ]);

        return back()->with('success', 'Student updated successfully!');
    }

    // Delete Student Function
    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return back()->with('success', 'Student deleted successfully!');
    }
}
