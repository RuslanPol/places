<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
         $users=User::all();
         return view('user.index',compact('users'));

    }


//    public function store()
//    {
//        $user = request()->validate([
//            'login' => 'required|string|unique:users|max:255',
//            'password' => 'required|string|min:8',
//            'is_admin' => 'boolean',
//        ]);
//
//        User::create([
//        'name' => $user->name,
//            'email' => $user->email,
//            'password' => Hash::make($user->password),
//            'is_admin' =>  $user->boolean('is_admin']);
//        return redirect()->route('user.index');
//    }


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'is_admin' => 'nullable|boolean',
        ]);

        // Создание нового пользователя
        User::create([
            'login' => $validatedData['login'],
            'password' => Hash::make($validatedData['password']),
            'is_admin' => $validatedData['is_admin'] ?? false,
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function addFavoritePlace(Request $request, User $user)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:favorite_places,name',
                function ($attribute, $value, $fail) use ($user) {
                    if ($user->favoritePlaces()->count() >= 3) {
                        $fail('A user can have no more than 3 favorite places.');
                    }
                    if ($user->favoritePlaces()->where('name', $value)->exists()) {
                        $fail('This place has already been added to the user\'s favorite places.');
                    }
                },
            ],
        ]);

        $user->favoritePlaces()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('user.show', $user)->with('success', 'Place added to favorite places successfully.');
    }

    public function viewFavoritePlaces(User $user)
    {
        $favoritePlaces = $user->favoritePlaces;
        return view('user.favorite_places', compact('user', 'favoritePlaces'));
    }


    public function getFavoritePlaces($userId)
    {
        $user = User::findOrFail($userId);
        return $user->places;
    }
}
