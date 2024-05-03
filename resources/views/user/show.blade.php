@extends('layout.main')

@section('content')
    <div class="show-user" style="display: flex">
        <aside class="sidebar">
            @include('include.sidebar')
        </aside>
        <div class="card col-lg-10 mt-3" style="margin-left: 14rem">
            <div class="card-header" style="padding: 12px; padding-left: 1rem; font-size: 1.1rem;">
                User Record <b>#{{ $user->user_id }}</b>
            </div>
            <div class="card-body" style="margin-left: 1rem; margin-top: 0.5rem;">
                <form action="#" method="post">
                    @csrf
                    <div class="row">
                        {{-- profile pic --}}
                        <div class="col-lg-2 text-center" style="margin-right: 2rem;">
                            <div class="col">
                                <img src="{{ ($user->user_image) ? asset('storage/img/user/' . $user->user_image) : 'https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/themes/774354/settings_images/Xco28EgLSlixesEbQzJx_Avatar3.png'}}" alt="User Image" style="width: 200px; height: 200px; padding-bottom: 0.5rem; border-radius: 50%">
                            </div>
                            
                            <div class="col text-control" style="padding-bottom: 0.5rem; width: 200px">
                                <input type="text" class="form-control text-center" id="username" name="username"
                                        style="cursor: auto; background: none; border: none; font-weight: bold;" value="{{ $user->username }}" disabled />
                                <label for="username" style="font-size: 90%">Username</label>
                            </div>
                        </div>

                        <div class="col">
                            {{-- full name --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="full_name" class="col-form-label col-lg-4">Full Name</label>
                                <div class="">
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        value="{{ $user->first_name }} @if($user->middle_name){{ $user->middle_name[0] }}. @endif{{ $user->last_name }} @if($user->suffix_name){{ $user->suffix_name }} @endif"
                                        disabled>
                                </div>
                            </div>
                            {{-- birth date --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="birth_date" class="col-form-label col-lg-4">Birth Date</label>
                                <div class="col-lg p-0">
                                    <input type="date" class="form-control col-lg" name="birth_date" id="birth_date"
                                        min="1990-01-01" style="cursor: auto;" value="{{ $user->birth_date }}" disabled />
                                </div>
                            </div>
                            {{-- gender --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="gender" class="col-form-label col-lg-4">Gender</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="gender" name="gender"
                                    value="{{ $user->gender->gender }}" style="cursor: auto;" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="col" style="padding-left: 1.75rem; padding-right: 1.7rem;">
                            {{-- address --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="adress" class="col-form-label col-lg-4">Address</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="address" name="address"
                                        style="cursor: auto;" value="{{ $user->address }}" disabled />
                                </div>
                            </div>
                            {{-- contact number --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="contact_number" class="col-form-label col-lg-4">Contact Number</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="contact_number" name="contact_number"
                                        style="cursor: auto;" value="{{ $user->contact_number }}" disabled />
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="form-row" style="padding-bottom: 0.5rem;">
                                <label for="email" class="col-form-label col-lg-4">Email</label>
                                <div class="col p-0">
                                    <input type="text" class="form-control" id="email" name="email"
                                        style="cursor: auto;" value="{{ $user->email }}" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/users" class="btn btn-primary float-end me-3">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
