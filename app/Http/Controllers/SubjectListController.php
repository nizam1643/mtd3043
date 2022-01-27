<?php

namespace App\Http\Controllers;

use App\Models\M3Subject;
use App\Models\M4Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectListController extends Controller
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

    public function virtual($id, User $user)
    {
        $prodID = base64_decode(base64_decode($id));
        $data   = M3Subject::find($prodID);
        return view('subject.index',compact('data','id'));
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
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'desc' => 'required',
                'url' => 'required',
                'subject_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->with('errorForm', $validator->errors()->getMessages())
                    ->withInput();
            }

            try {
                M4Note::create([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'url' => $request->url,
                    'subject_id' => $request->subject_id,
                ]);

                return redirect()->back()
                    ->with('success', 'Created successfully!');
            } catch (\Exception $e){
                return redirect()->back()
                    ->with('error', 'Error during the creation!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $user)
    {
        $prodID = base64_decode(base64_decode($id));
        $data   = M3Subject::find($prodID);
        return view('subject.show',compact('data','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required',
            'url' => 'required',
            'subject_id' => 'required',
        ]);

        try {

            $notes = M4Note::find($id);
            $notes->title = $request->title;
            $notes->desc = $request->desc;
            $notes->url = $request->url;
            $notes->save();

            return redirect()->back()
                ->with('success', 'Updated successfully!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $notes=M4Note::find($id);
            $notes->delete(); //returns true/false

            return redirect()->back()
                ->with('success', 'Deleted successfully!');
        } catch (\Exception $e){
            return redirect()->back()
                ->with('error', 'Error during the creation!');
        }
    }
}
