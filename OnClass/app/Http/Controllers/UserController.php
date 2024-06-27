<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser()
    {
        //echo "show user";
        $users = [
            [
                'id' => 1,
                'name' => 'John Doe',
            ],
            [
                'id' => 2,
                'name' => 'Jane Doe',
            ]
        ];
        //return view('list', compact('users'));
        return view('list')->with(['users' => $users]);
    }

    function getUser($id, $name = '')
    {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request)
    {
        echo $request->id;
    }

    function info()
    {
        $info = [
                'name' => 'N.T.Hieu',
                'age' => '22',
                'occupation' => 'student'
        ];
        return view('information')->with(['info' => $info]);
    }
}
