@extends('layout.main')

@section('content')
    <div class="show-user" style="display: flex">
        <aside class="sidebar">
            @include('include.sidebar')
        </aside>
        <div class="card col-lg-10 mt-3" style="margin-left: 14rem">
            <div class="card-header" style="padding: 12px; padding-left: 1rem; font-size: 1.1rem;">
                Edit User <b>#{{ $user->user_id }}</b>
            </div>
            <div class="card-body" style="margin-left: 1rem; margin-top: 0.5rem;">
                <form action="/user/update/{{ $user->user_id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="first_name" class="col-form-label col-lg-4">First Name</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ $user->first_name }}" autofocus>
                                    @error('first_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="middle_name" class="col-form-label col-lg-4">Middle Name</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="middle_name" name="middle_name"
                                        value="{{ $user->middle_name }}">
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="last_name" class="col-form-label col-lg-4">Last Name</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ $user->last_name }}">
                                    @error('last_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="suffix_name" class="col-form-label col-lg-4">Suffix Name</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="suffix_name" name="suffix_name"
                                        value="{{ $user->suffix_name }}">
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="birth_date" class="col-form-label col-lg-4">Birth Date</label>
                                <div class="col-lg p-0">
                                    <input type="date" class="form-control col-lg" name="birth_date" id="birth_date"
                                        min="1990-01-01" style="cursor: auto;" value="{{ $user->birth_date }}">
                                    @error('birth_date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="gender" class="col-form-label col-lg-4">Gender</label>
                                <div class="col p-0">
                                    <select class="form-select" id="gender_id" name="gender_id">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->gender_id }}" {{ $gender->gender_id == $user->gender_id ? 'selected' : '' }}>
                                                {{ $gender->gender }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>                            

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="adress" class="col-form-label col-lg-4">Address</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="address" name="address"
                                        style="cursor: auto;" value="{{ $user->address }}">
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6" style="padding-left: 1.75rem; padding-right: 2.5rem;">
                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="contact_number" class="col-form-label col-lg-4">Contact Number</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="contact_number" name="contact_number"
                                        style="cursor: auto;" value="{{ $user->contact_number }}">
                                    @error('contact_number')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="email" class="col-form-label col-lg-4">Email</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="email" name="email"
                                        style="cursor: auto;" value="{{ $user->email }}">
                                </div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="username" class="col-form-label col-lg-4">Username</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="username" name="username"
                                        style="cursor: auto;" value="{{ $user->username }}">
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="padding-bottom: 0.5rem;">
                                <label for="user_image" class="col-form-label col-lg-4">User Image</label>
                                <div class="col p-0">
                                    <input type="file" class="form-control" id="user_image" name="user_image"
                                        style="cursor: auto;">
                                    @if ($user->user_image)
                                        <p>Current Image: {{ $user->user_image }}</p>
                                    @else
                                        <p>No image uploaded</p>
                                    @endif
                                    @error('user_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-end">Save</button>
                    <a href="/users" class="btn btn-primary float-end me-2">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
