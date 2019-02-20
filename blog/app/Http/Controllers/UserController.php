<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->sortByDesc('USERNAME');

        return View('user.index')
            ->with('user', $user);
    }


    public function create()
    {
  return View('user.create');
    }


    public function store(Request $request)
    {

		$this->validate($request, [
                'USER_ID' => 'required|string|max:13',
				'USERNAME' => 'required|string|max:150',
				'DISPLAY_NAME' => 'required|string',
		]);

		// store
		$user = new User;
        $user->USER_ID = $request->input('USER_ID');
		$user->USERNAME = $request->input('USERNAME');
		$user->DISPLAY_NAME = $request->input('DISPLAY_NAME');
		$user->save();

		// redirect
		return redirect('user')->with('message', 'Successfully created blog!');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);

        return View('user.show')
            ->with('user', $user);
    }


    public function edit($id)
    {
      $user = User::findOrFail($id);

        // show the edit form and pass the blog
        return View('user.edit')
            ->with('user', $user);
    }


    public function update(Request $request, $id)
    {

		$this->validate($request, [
				'USERNAME' => 'required|string|max:150',
				'DISPLAY_NAME' => 'required|string',
		]);

		// store
		$user = User::findOrFail($id);
		$user->USERNAME = $request->input('USERNAME');
		$user->DISPLAY_NAME = $request->input('DISPLAY_NAME');
		$user->save();

		// redirect
		return redirect('user')->with('message', 'Successfully updated blog!');
    }


    public function destroy($id)
    {
        // delete
        $user = User::findOrFail($id);
//        $user->primary('user_id');
        $user->delete();
		// redirect
		return redirect('user')->with('message', 'Successfully deleted user!');
    }
}
