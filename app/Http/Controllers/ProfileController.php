<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update()
    {
        $userId = auth()->user()->id;
        $data = request()->validate(
            [
                'name' => 'required|min:3',
                'email' => ['required', Rule::unique('users')->ignore($userId)],
                'password' => 'nullable|confirmed|min:8',
                'image' => 'mimes:jpeg,jpg,png'
                ]
            );

        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        if (request()->hasFile('image')) {
            $path = request()->image->store('images/users');
            $data['image'] = $path;
        }
        User::findorfail($userId)->update($data);
        return redirect('/projects');

    }
}
