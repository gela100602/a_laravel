@extends('layout.main')

<title>Login</title>

@section('content')
    <div class="container position-relative">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-xl-6 col-lg-7 col-md-9" style="width: 550px;">
                <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 5%">
                    <div class="p-5">
                        <div class="text-center">
                            <h3 class="mb-5">Sample App</h3>
                        </div>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group mt-4">
                                <input type="text" class="form-control form-control-user" id="username" name="username"
                                    placeholder="Username">
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <input type="password" class="form-control form-control-user" id="password" name="password"
                                    placeholder="Password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="message-container" style="position: fixed; bottom: 0; right: 1rem;">
            {{-- @include('include.messages') --}}
            @if (session('message_success'))
                <div class="alert alert-success">
                    {{ session('message_success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
