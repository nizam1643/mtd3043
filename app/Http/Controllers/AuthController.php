<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\LoginMail;
use App\Mail\RegisterMail;
use App\Models\M1Year;
use App\Models\M3Subject;
use App\Models\M8Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'dashboard']);
        $this->middleware('auth')->only(['logout', 'dashboard']);
    }

    /**
     * register form.
     *
     * @return void
     */
    public function registerForm()
    {
        return view('register');
    }

    /**
     * register form submit.
     *
     * @return void
     */
    public function register(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
        ]);

        $token = Str::random(30);

        $user = new User;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->email_verified = '0';
        $user->token = $token;
        $user->save();

        Mail::to($input['email'])->send(new RegisterMail($token));

        return redirect()->back()->with('success', 'Verification mail sent, please check your inbox.');
    }

    /**
     * register verified.
     *
     * @return void
     */
    public function verify(Request $request)
    {
        $input = $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('token', $input['token'])
            ->where('email_verified', '0')
            ->first();

        if ($user != null) {
            User::where('token', $input['token'])
                ->update([
                    'email_verified' => '1',
                    'token' => ''
                ]);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'You are successfully registered.');
        }

        return redirect()->back()->with('error', 'Verification link is not valid.');
    }

    /**
     * login form.
     *
     * @return void
     */
    public function loginForm()
    {
        return view('login');
    }

    /**
     * login link sent to mail.
     *
     * @return void
     */
    public function sendLink(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $input['email'])
            ->where('email_verified', '1')
            ->first();

        if ($user != null) {
            $token = Str::random(30);

            User::where('email', $input['email'])
                ->where('email_verified', '1')
                ->update(['token' => $token]);

            Mail::to($input['email'])->send(new LoginMail($token));

            return redirect()->back()->with('success', 'Login link sent, please check your inbox.');
        }

        return redirect()->back()->with('error', 'Email is not registered.');
    }

    /**
     * login process.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $input = $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('token', $input['token'])
            ->where('email_verified', '1')
            ->first();

        if ($user != null) {
            User::where('token', $input['token'])
                ->where('email_verified', '1')
                ->update(['token' => '']);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'You are successfully logged in.');
        }

        return redirect()->back()->with('error', 'Login link is not valid.');
    }

    /**
     * logout process.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        Session::flush();

        return redirect()->route('login')->with('success', 'you are successfully logged out.');
    }

    /**
     * dashboard page
     *
     * @return void
     */
    public function dashboard()
    {

        if (auth()->user()->system_level == 4) {
            return view('user.dashboardparent');
        } else {
            $datas = User::with('subject')
            ->where('id', auth()->user()->id)
            ->get();
            $admins = M3Subject::all();
            return view('user.dashboard', compact('datas', 'admins'));
        }

    }

    public function dashboardparent()
    {
        $datas = M8Feedback::with('user_id')
        ->where('id', auth()->user()->id)
        ->get();
        return view('user.dashboardparent', compact('datas'));
    }
}
