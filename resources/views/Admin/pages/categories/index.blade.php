@extends('Admin.layout.app')

@section('admin-content')
    @if(Route::currentRouteName() == 'admin.categories.create')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4 justify-content">
            <h1 class="text-center">Add Categories</h1>
            <form method="post" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="row ">
                    <div class="col-12 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="LName" placeholder="Category Name">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @elseif(Route::currentRouteName() == 'admin.categories.edit')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4 justify-content">
            <h1 class="text-center">Add Categories</h1>
            <form method="post" action="{{ route('admin.categories.update', $categorie->id) }}">
                @csrf
                <div class="row ">
                    <div class="col-12 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="LName" placeholder="Category Name" value="{{ $categorie->categoryName }}">
                            @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @else

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-pulse fa-sm text-white-50"></i>Add Categories</a>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">categories List</h6>
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
                                <th>Category Name</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }}</td>
                                    <td>{{ $categorie->categoryName }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-success">
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
