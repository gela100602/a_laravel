@extends('layout.main')

@section('content')
    <div class="content-area" style="width: 100%; max-height:700px; padding-top: 3rem">

        <div class="container-fluid">
            <form action="{{ route('submit-form') }}" method="post">

                <div class="card">
                    <h5 class="card-header" style="margin: 1rem; background-color: white; padding-bottom: 1.3rem;">Create
                        User</h5>
                    <div class="card-body" style="margin-left: 1rem; margin-top: -0.3rem;">

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="first_name" class="col-form-label col-lg-4">First Name</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            value="" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="middle_name" class="col-form-label col-lg-4">Middle Name</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="last_name" class="col-form-label col-lg-4">Last Name</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="suffix_name" class="col-form-label col-lg-4">Suffix Name</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="suffix_name" name="suffix_name"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="birth_date" class="col-form-label col-lg-4">Birth Date</label>
                                    <div class="col-lg p-0">
                                        <input type="date" class="form-control col-lg" name="birth_date" id="birth_date"
                                            min="1990-01-01" value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="gender" class="col-form-label col-lg-4">Gender</label>
                                    <div class="col p-0">
                                        <select class="form-select" id="gender_id" name="gender_id">
                                            <!-- Show genders from genders table in database -->
                                            <?php foreach ($genders as $gender) : ?>
                                                <option value="<?= $gender->gender_id ?>"><?= $gender->gender ?></option>
                                                <!-- If gender id has value -->
                                                <?php if (set_value('gender_id') == $gender->gender_id) : ?>
                                                    <option value="<?= $gender->gender_id ?>" selected hidden><?= $gender->gender ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="adress" class="col-form-label col-lg-4">Address</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6" style="padding-left: 1.75rem; padding-right: 2.5rem;">
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="contact_number" class="col-form-label col-lg-4">Contact Number</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="contact_number" name="contact_number"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="email" class="col-form-label col-lg-4">Email</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="username" class="col-form-label col-lg-4">Username</label>
                                    <div class="col p-0">
                                        <input type="text" class="form-control" id="username" name="username"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="password" class="col-form-label col-lg-4">Password</label>
                                    <div class="col p-0">
                                        <input type="password" class="form-control" id="password" name="password"
                                            value="">
                                    </div>
                                </div>
                                <div class="form-group row" style="padding-bottom: 0.5rem;">
                                    <label for="confirm_password" class="col-form-label col-lg-4">Confirm Password</label>
                                    <div class="col p-0">
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" value="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-icon-split mt-4"
                            style="float: right; margin-right: 1rem; width: 10rem">
                            <span class="icon text-white">Save</span>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
