<title>Edit Gender</title>

@include('include.sidebar')

@section('content')

    <div class="card col-sm-6 mt-3 mx-auto">
        <div clas="card-body">
            <h5 class="card-title">Edit Gender</h5>
            <form action="/gender/update/{{ $gender->gender_id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender }}" />
                    @error('gender') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <button type="submit" class="btn btn-success col-sm-3 float-end">Save Gender</button>
                <a href="/genders" class="btn btn-secondary col-sm-3 float-end no-1">Back</a>
            </form>
        </div>
    </div>
