<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $search = request()->get('search');

        $query = User::join('table_genders','table_users.gender_id','=','table_genders.gender_id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('middle_name', 'LIKE', "%$search%")
                    ->orWhere('gender', '=', $search); // match exactly
            });
        }
        $query->orderBy('table_users.updated_at', 'desc');
        $query->orderBy('table_users.created_at', 'desc');

        $table_users = $query->paginate(5);
        
        return view('user.index', compact('table_users'));
    }

    public function create()
    {
        $genders = Gender::all();
        return view("user.create", compact("genders"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'first_name' => ['required'],
                'middle_name' => ['nullable'],
                'last_name' => ['required'],
                'suffix_name' => ['nullable'],
                'gender_id' => ['required'],
                'birth_date' => ['required', 'date'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'email' => ['required', 'unique:table_users', 'email'],
                'username' => ['required', Rule::unique('table_users', 'username')],
                'password' => ['required', 'same:confirm_password'],
                'confirm_password' => ['required'],
                'user_image' => ['nullable', 'mimes:jpeg,png,bmp,biff', 'max:4096']
            ],
            [
                'first_name.required' => 'Please enter your first name.',
                'last_name.required' => 'Please enter your last name.',
                'gender_id.required' => 'Please select your gender.',
                'birth_date.required' => 'Please enter your birth date.',
                'birth_date.date' => 'Please enter a valid date for your birth date.',
                'address.required' => 'Please enter your address.',
                'contact_number.required' => 'Please enter your contact number.',
                'email.required' => 'Please enter your email address.',
                'email.unique' => 'This email address is already in use.',
                'email.email' => 'Please enter a valid email address.',
                'username.required' => 'Please enter a username.',
                'username.unique' => 'This username is already taken.',
                'password.required' => 'Please enter a password.',
                'password.same' => 'The password and confirmation password do not match.',
                'confirm_password.required' => 'Please confirm your password.',
                'user_image.mimes' => 'The user image must be a file of type: jpeg, png, bmp, or biff.',
                'user_image.max' => 'The user image may not be greater than 4MB in size.'
            ]
        );

        if ($request->hasFile('user_image')) {
            $filenameWithExtension = $request->file('user_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/img/user', $filenameToStore);

            $validated['user_image'] = $filenameToStore;
        }

        User::create($validated);

        return redirect('/users')->with('message_success', 'User successfully saved!');
    }

    public function show($id)
    {
        $user = User::find($id); // SELECT * FROM table_users WHERE user_id = $id;
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id); //SELECT * FROM table_users WHERE user_id = $id;
        $genders = Gender::all();
        return view('user.edit', compact('genders', 'user'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => ['required'],
                'middle_name' => ['nullable'],
                'last_name' => ['required'],
                'suffix_name' => ['nullable'],
                'gender_id' => ['required'],
                'birth_date' => ['required', 'date'],
                'address' => ['required'],
                'contact_number' => ['required'],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('table_users')->ignore($user),
                ],
                'username' => [
                    'required',
                    Rule::unique('table_users')->ignore($user),
                ],
                'user_image' => ['nullable', 'mimes:jpeg,png,bmp,biff', 'max:4096']
            ],
            [
                'first_name.required' => 'Please enter the first name.',
                'last_name.required' => 'Please enter the last name.',
                'gender_id.required' => 'Please select a gender.',
                'birth_date.required' => 'Please enter the birth date.',
                'birth_date.date' => 'Please enter a valid date for the birth date.',
                'address.required' => 'Please enter the address.',
                'contact_number.required' => 'Please enter the contact number.',
                'email.required' => 'Please enter the email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already in use.',
                'username.required' => 'Please enter the username.',
                'username.unique' => 'This username is already taken.',
                'user_image.mimes' => 'The user image must be a file of type: jpeg, png, bmp, or biff.',
                'user_image.max' => 'The user image may not be greater than 4MB in size.'
            ]
        );

        $validated = $validator->validate();

        if ($request->hasFile('user_image')) {
            $filenameWithExtension = $request->file('user_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('user_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/img/user', $filenameToStore);

            $validated['user_image'] = $filenameToStore;
        }

        $user->update($validated);
        return redirect('/users')->with('message_success', 'User successfully updated!');
    }

    public function delete($id)
    {
        $user = User::find($id); // SELECT * FROM table_users WHERE user_id = $id;
        return view('user.delete', compact('user'));
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->user_image && Storage::exists('public/img/user/' . $user->user_image)) {
            Storage::delete('public/img/user/' . $user->user_image);
        }

        $user->delete($request);
        return redirect('/users')->with('message_success', 'User successfully deleted!');
    }

    public function login()
    {
        return view('login.login');
    }

    public function loginAuth(Request $request)
    {
        $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
            ],
            [
                'username.required' => 'Username is required.',
                'password.required' => 'Password is required.',
            ]
        );

        $potentialUser = User::where('username', $request->input('username'))
            ->first();

        if (!$potentialUser) {
            return redirect()->to('/login')
                ->withErrors(['username' => 'Invalid username']);
        }

        if (!password_verify($request->input('password'), $potentialUser['password'])) {
            return redirect()->to('/login')
                ->withErrors(['password' => 'Incorrect password']);
        }

        auth()->login($potentialUser);
        request()->session()->regenerate();

        return redirect('/users')->with('message_success', 'User successfully logged in!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login')->with('message_success', 'User successfully logged out!');
    }
}
