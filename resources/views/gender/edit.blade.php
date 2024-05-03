@extends('layout.main')

@section('content')

<div class="edit-gender" style="display: flex;">
    <aside class="sidebar">
        @include('include.sidebar')
    </aside>
    <div class="card col-sm-4 mt-3 mx-auto">
        <div class="card-header" style="padding: 12px; padding-left: 1rem; font-size: 1.1rem;">
            Edit Gender
        </div>
        <div class="card-body">
            <form action="/gender/update/{{ $gender->gender_id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender }}" />
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success w-25 float-end">Save</button>
                <a href="/genders" class="btn btn-primary w-25 float-end me-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

