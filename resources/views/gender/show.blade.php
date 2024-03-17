{{-- tab title --}}
<title>Create Gender</title>

{{-- side bar --}}
@include('include.sidebar')

{{-- html content --}}
@section('content')

    {{-- card --}}
    <div class="card col-sm-6 mt-3 mx-auto">
        <div class="card-body">
            <h5 clas="card-title">Show Gender</h5>
            {{-- form POST method --}}
            <form action="#" method="post">
                {{-- gender field --}}
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $gender->gender }}" readonly />
                </div>
                <a href="/genders" class="btn btn-secondary col-sm-3 float-end no-1">Back</a>
            </form>
        </div>
    </div>
