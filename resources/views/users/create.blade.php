@extends('layouts.main')

@section('nav_users_management')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('users.index') }}">Users Management</a></li>
            <li><span>New User</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h3 class="heading_b uk-margin-bottom">Users Management</h3>

    <div class="md-card uk-margin-medium-bottom" style="padding: 20px;">

        <form action="{{ route('users.store') }}" method="post">
            {{ csrf_field() }}
            <div class="md-card-content">
                <h2 class="heading_a">
                    New User Form
                    <span class="sub-heading">Fill up all the required fields and click submit</span>
                </h2>
                <hr class="md-hr"/>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-3 ">
                        <label for="wizard_fullname">First Name<span class="req">*</span></label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}" required class="md-input {{ $errors->has('first_name') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('first_name'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="uk-width-medium-1-3 ">
                        <label for="wizard_fullname">Middle Name</label>
                        <input type="text" name="middle_name" value="{{ old('middle_name') }}" class="md-input"/>
                    </div>
                    <div class="uk-width-medium-1-3 ">
                        <label for="wizard_fullname">Last Name<span class="req">*</span></label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}" required class="md-input {{ $errors->has('last_name') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('last_name'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2 ">
                        <label for="wizard_fullname">Email<span class="req">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="md-input {{ $errors->has('email') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('email'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="wizard_fullname">Mobile No</label>
                        <input type="text" name="mobile_no" value="{{ old('mobile_no') }}" required class="md-input {{ $errors->has('mobile_no') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('mobile_no'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('mobile_no') }}</span>
                        @endif
                    </div>
                </div>
                <div class="uk-grid">

                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2 ">
                        <label for="wizard_fullname">Username<span class="req">*</span></label>
                        <input type="text" name="username" value="{{ old('username') }}" required class="md-input {{ $errors->has('username') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('username'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="uk-width-medium-1-2">
                        <select data-md-selectize name="role_id">
                            <option value="">User Role</option>
                            @foreach ($roles as $key => $role)
                                <option @if (old('role_id') == $role->id) selected @endif value="{{ $role->id }}">{{ strtoupper($role->name) }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('role_id'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('role_id') }}</span>
                        @endif
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-2 ">
                        <label for="wizard_fullname">Password<span class="req">*</span></label>
                        <input type="password" name="password" required class="md-input {{ $errors->has('password') ? ' md-input-danger' : '' }}" />
                        @if ($errors->has('password'))
                            <span class="uk-form-help-block uk-text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="uk-width-medium-1-2 ">
                        <label for="wizard_fullname">Confirm Password<span class="req">*</span></label>
                        <input type="password" name="password_confirmation" required class="md-input" />
                    </div>
                </div>
                <div class="uk-grid">
                    <div class="uk-width-medium-1-1">
                        <button class="md-btn md-btn-primary md-btn-wave-light" type="submit">Submit</button>
                    </div>

                </div>
            </div>

        </form>

    </div>
@endsection
