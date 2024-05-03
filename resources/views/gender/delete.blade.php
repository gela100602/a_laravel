@extends('layout.main')

@section('content')
    <div class="delete-gender" style="display: flex;">
        <aside class="sidebar">
            @include('include.sidebar')
        </aside>
        <div class="card col-sm-4 mt-3 mx-auto">
            <div class="card-header" style="padding: 12px; text-align: center">
                <h5>Are you sure you want to delete this?</h5>
            </div>
            <div class="card-body">
                <form action="/gender/destroy/{{ $gender->gender_id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="mb-3">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender"
                            value="{{ $gender->gender }}" style="cursor: auto" disabled />
                    </div>
                    <button type="submit" class="btn btn-danger w-50 float-start" style="border-radius: 0%">Delete</button>
                    <a href="/genders" class="btn btn-primary w-50 float-end" style="border-radius: 0%">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection