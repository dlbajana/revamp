@extends('layouts.main')

@section('nav_users_management')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('users.index') }}">Users Management</a></li>
            <li><span>{{ $user->fullName() }}</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h3 class="heading_b uk-margin-bottom">Users Management</h3>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-large-1-1">
            <div class="md-card uk-margin-medium-bottom" style="padding-top: 20px; padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">
                <div class="md-card-content">
                    <h2 class="heading_a">
                        {{ $user->fullName() }}
                        <span class="sub-heading">{{ $user->email }}</span>
                    </h2>
                    <hr class="md-hr">
                    <div class="uk-grid">
                        <div class="uk-width-medium-1-2">
                            <h4 class="heading_c uk-margin-small-botto">User Info</h4>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE853;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">{{ $user->username }}</span>
                                        <span class="uk-text-small uk-text-muted">Username</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE8D3;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">{{ $user->role->name }}</span>
                                        <span class="uk-text-small uk-text-muted">Role</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <h4 class="heading_c uk-margin-small-botto">&nbsp;</h4>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">{{ $user->mobile_no }}</span>
                                        <span class="uk-text-small uk-text-muted">Mobile No</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons">&#xE8D3;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">
                                            <span class="uk-badge @if ($user->status == 'active') uk-badge-success @else uk-badge-default @endif" style="float: left">{{ strtoupper($user->status) }}</span>
                                        </span>
                                        <span class="uk-text-small uk-text-muted">Status</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
