@extends('layout.main')

@section('content')

<div class="delete-gender" style="display: flex;">
    <aside class="sidebar">
        @include('include.sidebar')
    </aside>
    <div class="card col-sm-4 mt-3 mx-auto">
        <div class="card-header" style="padding: 12px; display: flex; justify-content: space-between; align-items: center;">
            <p class="modal-title">Delete User</p>
            <a class="material-symbols-outlined" href="/users" class="btn" style="color: black; text-decoration: none">close</a>
        </div>
        <div class="card-body">
            <form action="/user/destroy/{{ $user->user_id }}" method="post">
                @method('DELETE')
                @csrf
                <div class="mb-4 mt-2" style="text-align: center">
                    <h5>Are you sure you want to delete this user?</h5>
                </div>
                <button type="submit" class="btn btn-danger w-50 float-start" style="border-radius: 0%">Delete</button>
                <a href="/users" class="btn btn-primary w-50 float-end" style="border-radius: 0%">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection