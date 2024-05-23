<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No Students Found'], 200);
        }
        return response()->json($students, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits|',
            'language' => 'required',
        ]);

        if ($validator->fails($request->all)) {
            $data = [
                'status' => 400,
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
            ];
            return response()->json($data, 400);
        }

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'language' => $request->language
        ]);
        if (!$student) {
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'student' => $student,
            'status' => 201
        ];
        return response()->json($data, 200);
    }
}
