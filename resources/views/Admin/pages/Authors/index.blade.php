@extends('Admin.layout.app')

@section('admin-content')
    @if(Route::currentRouteName() == 'admin.author.create')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4">
            <h1 class="text-center">Add Author</h1>
            <form method="post" action="{{ route('admin.authors.store') }}">
                @csrf
                <div class="row ">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="FName" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="FName" placeholder="Author First Name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="LName" placeholder="Author Last Name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="author@gmail.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @elseif(Route::currentRouteName() == 'admin.authors.edit')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4">
            <h1 class="text-center">Edit Author</h1>
            <form method="post" action="{{ route('admin.authors.update', $authors->id) }}">
                @csrf
                <div class="row ">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="FName" class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="FName" value="{{ $authors->Fname }}" placeholder="Author First Name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="LName"  value="{{ $authors->Lname }}" placeholder="Author Last Name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"  value="{{ $authors->email }}" placeholder="author@gmail.com">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @else
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Author</h1>
        <a href="{{ route('admin.author.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Add Author</a>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Author List</h6>
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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->Fname }}</td>
                                        <td>{{ $author->Lname }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.authors.edit', $author->id) }}" class="btn btn-success">
                                                <i class="fa fa-edit" >Edit</i>
                                            </a>
                                            <a href="{{ route('admin.authors.delete', $author->id) }}" class="btn btn-danger">
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
@endsection()
