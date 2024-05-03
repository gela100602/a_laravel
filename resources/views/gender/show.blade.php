@extends('layout.main')

@section('content')

<div class="show-gender" style="display: flex;">
    <aside class="sidebar">
        @include('include.sidebar')
    </aside>
    <div class="card col-sm-4 mt-3 mx-auto">
        <div class="card-header" style="padding: 12px; padding-left: 1rem; font-size: 1.1rem;">
            Gender Record
        </div>
        <div class="card-body">
            <form action="#" method="post">
                @csrf
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender }}" style="cursor: auto;"
                    disabled />
                </div>
                <a href="/genders" class="btn btn-primary w-25 float-end no-1">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

