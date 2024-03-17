{{-- tab title --}}
<title>Create Gender</title>

{{-- side bar --}}
@include('include.sidebar')

{{-- html content --}}
@section('content')

    {{-- card --}}
    <div class="card col-sm-6 mt-3 mx-auto">
        <div class="card-body">
            <h5 clas="card-title">Create Gender</h5>
            {{-- form POST method --}}
            <form action="/gender/store" method="post">
                @csrf
                {{-- gender field --}}
                <div class="mb-3">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" />
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                {{-- save button --}}
                <button type="sumbit" class="btn btn-success col-sm-3 float-end">Save Gender</button>
            </form>
        </div>
    </div>
