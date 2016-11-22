<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.home');
    }

    public function editUsers()
    {

        if (Auth::user()->isAdmin())
            $users = User::all();
        else
            $users = User::where('id', Auth::id())->get();


        return view('home.editUsers', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [

            'name' => 'required|max:255',
            'role' => 'required|integer'

        ]);

        // Varmistetaan että käyttäjällä on vain yksi rooli
        $user->detachAllRoles();
        // Lisätään rooli
        $user->attachRole($request->get('role'));
        // Päivitetään käyttäjän tiedot
        $user->update($request->all());

        return redirect('/edit-users');

    }

    public function delete(User $user)
    {

        $user->delete();

        return redirect('/edit-users');

    }
}
