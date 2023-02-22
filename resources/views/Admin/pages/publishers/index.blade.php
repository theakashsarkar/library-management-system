@extends('Admin.layout.app')

@section('admin-content')
    @if(Route::currentRouteName() == 'admin.publishers.create')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4">
            <h1 class="text-center">Add Author</h1>
            <form method="post" action="{{ route('admin.publishers.store') }}">
                @csrf
                <div class="row ">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Publishers Name</label>
                            <input type="text" name="publisher_name" class="form-control" id="LName" placeholder="Author Last Name">
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="publisher_email" class="form-control" id="email" placeholder="author@gmail.com">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @elseif(Route::currentRouteName() == 'admin.publishers.edit')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4">
            <h1 class="text-center">Add Author</h1>
            <form method="post" action="{{ route('admin.publishers.update', $publishers->id) }}">
                @csrf
                <div class="row ">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Publishers Name</label>
                            <input type="text" name="publisher_name" class="form-control" id="LName" placeholder="publishers Name" value="{{ $publishers->publisher_name }}">
                            @error('publisher_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="publisher_email" class="form-control" id="email" placeholder="publishers@gmail.com" value="{{ $publishers->publisher_email }}">
                            @error('publisher_email')
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
        <h1 class="h3 mb-0 text-gray-800">Publishers</h1>
        <a href="{{ route('admin.publishers.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Add Publishers</a>
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
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->id }}</td>
                                    <td>{{ $publisher->publisher_name }}</td>
                                    <td>{{ $publisher->publisher_email }}</td>
                                    <td>
                                        <a href="{{ route('admin.publishers.edit', $publisher->id) }}" class="btn btn-success">
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
@endsection()
