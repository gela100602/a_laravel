@extends('layout.main')

@section('content')
    <div class="user" style="display: flex;">
        <aside class="sidebar">
            @include('include.sidebar')
        </aside>
        <div class="table-responsive" style="width: 100%; margin-left: 14rem; margin-right: 1rem;">
            <div class="card mt-3" style="display: flex">
                <div class="card-header" style="display: flex; justify-content: space-between;">
                    <span style="font-size: 1.1rem; padding-top: 5px">List of Users</span>
                    {{-- search form --}}
                    <div style="width: 340px">
                        <form class="d-flex" action="/users">
                            <input class="form-control" type="text" name="search" id="search" placeholder="Search" style="border-radius: 5px 0 0 5px">
                            <input class="btn btn-outline-secondary" type="submit" value="Search" style="border-radius: 0 5px 5px 0">
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/user/create" class="btn btn-primary">Add User</a>
                    <table class="table mt-3" style="table-layout: fixed">
                        {{ $table_users->withQueryString()->links() }}
                        <thead>
                            <tr>
                                <th class="text-center">Profile Picture</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Gender</th> 
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($table_users as $user)
                                <tr>
                                    <td class="text-center"><img
                                            src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : 'https://kajabi-storefronts-production.kajabi-cdn.com/kajabi-storefronts-production/themes/774354/settings_images/Xco28EgLSlixesEbQzJx_Avatar3.png' }}"
                                            class="img-fluid" style="border-radius: 50%;" width="70" height="70">
                                    </td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->middle_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" style="cursor: pointer">
                                            <a class="material-symbols-outlined" href="/user/view/{{ $user->user_id }}"
                                                class="btn btn-primary"
                                                style="color: blue; text-decoration: none;">preview</a>
                                            <a class="material-symbols-outlined" href="/user/edit/{{ $user->user_id }}"
                                                class="btn btn-warning"
                                                style="color: #f5c71a; text-decoration: none;">edit</a>
                                            <a class="material-symbols-outlined" href="/user/delete/{{ $user->user_id }}"
                                                class="btn btn-danger" style="color: red; text-decoration: none;">delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="message-container" style="position: fixed; bottom: 0; right: 1rem;">
                @if (session('message_success'))
                    <div class="alert alert-success">
                        {{ session('message_success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
