<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    // index
    // show
    // create
    // store
    // edit
    // update
    // delete


    public function index(){
        $table_genders = Gender::all(); // SELECT * FROM table_genders;
        return view('gender.index', compact('table_genders'));
    }
    
    public function show($id){
        $gender = Gender::find($id); // SELECT * FROM table_genders WHERE gender_id = $id;
        return view('gender.show', compact('gender'));
    }

    public function create(){
        return view('gender.create');
    }

    public function store(Request  $request){
        $validated = $request->validate([
            'gender' => ['required']
        ]);

        Gender::create($validated);
        
        return redirect('/genders')->with('message_success', 'Gender successfully saved!');
    }

    public function edit($id){
        $gender = Gender::find($id); //SELECT * FROM table_gendes WHERE gender_id = $id;
        return view('gender.edit', compact('gender'));
    }

    public function update(Request $request, Gender $gender){
        $validated = $request->validate([
            'gender' => ['required']
        ]);

        $gender->update($validated);

        return redirect('/genders')->with('message_success', 'Gender successfully updated!');

    }

    public function delete(){
        
    }

}
