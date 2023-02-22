@extends('Admin.layout.app')

@section('admin-content')
    @if(Route::currentRouteName() == 'admin.users.edit')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4">
            <h1 class="text-center">Role Management</h1>
            <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                @csrf
                <div class="row ">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Role</label>
                            <br>
                            <select name="role" id="role" class="form-control">
                                    <option selected>Select Role</option>
                                    <option value="0">users</option>
                                    <option value="2">librarian</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @else
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                        @if(Session::has('success'))
                            <div class="alert alert-danger">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table " id="dataTable">
                            <thead>
                            <tr>
                                <th>sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Role create</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        @if ($user->role == 2)
                                            <td>libiran</td>
                                        @elseif ($user->role == 1)
                                            <td>admin</td>
                                        @else
                                            <td>user</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success">
                                                <i class="fa fa-edit" >Edit</i>
                                            </a>
                                            <a href="" class="btn btn-danger">
                                                <i class="fa fa-trash" >Delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
