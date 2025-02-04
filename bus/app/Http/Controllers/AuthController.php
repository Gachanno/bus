<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // вход

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Неверный email или пароль'], 401);
        }
        Auth::login($user);

        // return response()->json([
        //     'message' => 'Вы успешно вошли в систему! Круто',
        //     'user' => $user,
        // ]);

        return redirect('/');
    }

    // выход

    public function logout(Request $request)
{
    Auth::logout();
    return redirect('/');
}

// регистрация

    public function register(Request $request){
        $validated = $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024' 
        ]);


        $avatarPath = null;
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public'); //storage/app/public/avatars
        }

        $user = User::create([
            'login' => $validated['login'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'avatar' => $avatarPath,
            'is_admin' => false,
        ]);

        return response()->json(['message' => 'Регистрация прошла успешно', 'user' => $user], 201);

    }

    public function showUsers()
    {
        $users = User::all(); 
        return view('bus-admin', compact('users')); 
    }
    

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect()->route('admin.users')->with('success', 'Пользователь удален!');
    }

    public function toggleAdmin($id)
    {
    $user = User::findOrFail($id); 

    $user->is_admin = !$user->is_admin;
    $user->save(); 

    return redirect()->back();
    }

}
