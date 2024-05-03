@extends('layout.main')

@section('content')

<div class="gender" style="display: flex;">
    <aside class="sidebar">
        @include('include.sidebar')
    </aside>
    <div class="table-responsive" style="margin-left: 14rem; margin-right: 1rem; margin-bottom: 1rem;">
        <div class="card mt-3">
            <div class="card-header" style="padding: 12px; padding-left: 1rem; font-size: 1.1rem;">
                List of Genders
            </div>
            <div class="card-body">
                <a href="/gender/create" class="btn btn-primary">Add Gender</a>
                <table class="table mt-3" style="table-layout: fixed">
                    <thead>
                        <tr>
                            <th>Gender</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table_genders as $gender)
                            <tr>
                                <td>{{ $gender->gender }}</td>
                                <td>{{ $gender->created_at }}</td>
                                <td>{{ $gender->updated_at }}</td>
                                <td>
                                    <div class="btn-group" style="cursor: pointer">
                                        <a class="material-symbols-outlined" href="/gender/view/{{ $gender->gender_id }}" class="btn btn-primary" style="color: blue; text-decoration: none;">preview</a>
                                        <a class="material-symbols-outlined" href="/gender/edit/{{ $gender->gender_id }}" class="btn btn-warning" style="color: #f5c71a; text-decoration: none;">edit</a>
                                        <a class="material-symbols-outlined" href="/gender/delete/{{ $gender->gender_id }}" class="btn btn-danger" style="color: red; text-decoration: none;">delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
</div>

@endsection
