@extends('layouts.main')

@section('nav_users_management')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><span>Users Management</span></li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h3 class="heading_b uk-margin-bottom">Users Management</h3>

    @if ($notify = session('notify'))
        <div class="uk-alert uk-alert-{{ $notify['type'] }}" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {{ $notify['message'] }}
        </div>
    @endif

    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions">
                <a href="{{ route('users.create') }}" class="md-btn md-btn-primary md-btn-small md-btn-wave-light waves-effect waves-button waves-light">New User</a>
            </div>
            <h3 class="md-card-toolbar-heading-text">All Users</h3>
        </div>
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-nowrap table_check">
                    <thead>
                    <tr>
                        <th class="uk-width-2-10">Name</th>
                        <th class="uk-width-2-10">Email</th>
                        <th class="uk-width-2-10">Username </th>
                        <th class="uk-width-1-10">Role</th>
                        <th class="uk-width-1-10 uk-text-center">Status</th>
                        <th class="uk-width-1-10 uk-text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->fullName() }}</a> </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td class="uk-text-center">
                                    <span class="uk-badge @if ($user->status == 'active') uk-badge-success @else uk-badge-default @endif">{{ strtoupper($user->status) }}</span>
                                </td>
                                <td class="uk-text-center">
                                    <a href="{{ route('users.edit', $user->id) }}"><i class="md-icon material-icons">&#xE254;</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    </div>
@endsection
