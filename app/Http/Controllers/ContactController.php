<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class ContactController extends Controller
{
    public function landingpage()
    {
        return view('contacts.landingpage');
    }

    public function loginpage()
    {
        return view('contacts.loginpage');
    }

    public function createaccount()
    {
        return view('contacts.createaccount');
    }

    public function createuser(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log in the newly created user
        auth()->login($user);

        return redirect()->route('home')->withSuccess('Account created successfully');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('log');
    }

    public function homepage()
    {
        return view('contacts.homepage');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $contacts = $user->contacts()->get();
        return view('contacts.index', ['contacts' => $contacts]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->user_id = auth()->user()->id;
        $contacts->save();

        return back()->withSuccess('Contact successfully created');
    }

    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('contacts.edit', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        // Fetch the product from the database
        $contacts = Contact::findOrFail($id);

        $contacts->name = $request->name;
        $contacts->phone = $request->phone;
        $contacts->email = $request->email;
        $contacts->save();

        return redirect()->route('tables', ['contacts' => $contacts])->withSuccess('Contact successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();
        return redirect()->route('tables')->withSuccess('Contact successfully deleted');
    }
}
