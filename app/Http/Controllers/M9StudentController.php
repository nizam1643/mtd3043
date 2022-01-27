<?php

namespace App\Http\Controllers;

use App\Models\M9Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M9StudentController extends Controller
{
    public function student()
    {
        return view('user.student');
    }

    public function studentlist()
    {
        $datas = M9Student::get();
        return view('user.studentlist', compact('datas'));
    }

    public function studentstore(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'point1' => 'required',
            'point2' => 'required',
            'point3' => 'required',
            'point4' => 'required',
            'point5' => 'required',
            'student_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            M9Student::create([
                'point1' => $request->point1,
                'point2' => $request->point2,
                'point3' => $request->point3,
                'point4' => $request->point4,
                'point5' => $request->point5,
                'pointMark' => $request->point1 + $request->point2 + $request->point3 + $request->point4 + $request->point5,
                'student_id' => $request->student_id,
            ]);

            return redirect()->back()
                ->with('success', 'Created successfully!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }
}
