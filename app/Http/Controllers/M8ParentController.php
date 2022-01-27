<?php

namespace App\Http\Controllers;

use App\Models\M8Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M8ParentController extends Controller
{

    public function parent()
    {
        $datas = M8Feedback::get();
        return view('user.feedbacklist', compact('datas'));
    }

    public function parentstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorForm', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            M8Feedback::create([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
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
