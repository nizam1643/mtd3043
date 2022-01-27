<?php

namespace App\Http\Controllers;

use App\Models\M6Submit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M6SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'url' => 'required',
            'user_id' => 'required',
            'assignment_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            M6Submit::create([
                'url' => $request->url,
                'assignment_id' => $request->assignment_id,
                'user_id' => $request->user_id,
            ]);

            return redirect()->back()
                ->with('success', 'Created successfully!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }
}
