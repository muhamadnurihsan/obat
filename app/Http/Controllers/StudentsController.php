<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Datatables;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
    {
        return view('students.index');
    }

    public function read()
    {
        $data = Students::all();
        return view('students.read')->with([
            'students' => $data
        ]);
    }

    public function showCreate()
    {
        $kelas = [9, 10, 11, 12];
        return view('students.add')->with([
            'kelas' => $kelas
        ]);
    }

    public function showEdit($id)
    {
        $data = Students::findOrFail($id);
        $kelas = [9, 10, 11, 12];
        return view('students.edit')->with([
            'students' => $data,
            'kelas' => $kelas
        ]);
    }

    public function store(Request $request)
    {
        $studentsId = $request->id;
        $students = Students::updateOrCreate(
            [
                'id' => $studentsId
            ],
            [
                'name' => $request->name,
                'class' => $request->class,
                'status' => 1
            ]
        );
        return Response()->json($students);
    }

    public function update(Request $request, $id)
    {
        $data = Students::findOrFail($id);
        $data->name = $request->name;
        $data->class = $request->class;
        $data->save();
    }

    public function deleteData($id)
    {
        $data = Students::findOrFail($id);
        $data->delete();
    }

    public function toggleStatus(Request $request)
    {
        $item = Students::find($request->id);
        if ($item) {
            $item->status = $item->status == '1' ? '0' : '1';
            $item->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
