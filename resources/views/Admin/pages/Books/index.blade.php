@extends('Admin.layout.app')

@section('admin-content')

    @if(Route::currentRouteName() == 'admin.books.create')
        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4 justify-content">
            <h1 class="text-center">Add Book</h1>
            <form method="post" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Book Name</label>
                            <input type="text" name="book_name" class="form-control" id="LName" placeholder="Book Name">
                            @error('book_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Book Title</label>
                            <input type="text" name="book_title" class="form-control" id="LName" placeholder="Book Title">
                            @error('book_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name" class="form-control" id="LName" placeholder="subject Name">
                            @error('subject_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Language</label>
                            <input type="text" name="language" class="form-control" id="LName" placeholder="language">
                            @error('language')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">status</label>
                            <input type="text" name="status" class="form-control" id="LName" placeholder="Category Name">
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Number Of Pages</label>
                            <input type="text" name="numberOfPages" class="form-control" id="LName" placeholder="number of pages">
                            @error('numberOfPages')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Publish Date</label>
                            <input type="text" name="publish_date" class="form-control" id="LName" placeholder="publish Date">
                            @error('publish_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Total Copy</label>
                            <input type="text" name="total_copy" class="form-control" id="LName" placeholder="Total copy">
                            @error('total_copy')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book Author</label>
                            <br>
                            <select name="author_id" id="author->id" class="form-control">
                                <option>Select Author</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->Fname }} {{ $author->Lname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book publishers</label>
                            <br>
                            <select name="publishers_id" id="publishers->id" class="form-control">
                                <option>Select publishers</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book Category</label>
                            <br>
                            <select name="category_id" id="category->id" class="form-control">
                                <option>Select category</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @elseif(Route::currentRouteName() == 'admin.books.edit')

        <div class="container-sm shadow p-3 mb-5 bg-body rounded px-4 justify-content">
            <h1 class="text-center">Edit Book</h1>
            <form method="post" action="{{ route('admin.books.store') }}">
                @csrf
                <div class="row ">
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Book Name</label>
                            <input type="text" name="book_name" class="form-control" value="{{ $book->book_name }}" id="LName" placeholder="Book Name">
                            @error('book_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Book Title</label>
                            <input type="text" name="book_title" class="form-control" value="{{ $book->title }}" id="LName" placeholder="Book Title">
                            @error('book_title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Subject Name</label>
                            <input type="text" name="subject_name" class="form-control" value="{{ $book->subject }}" id="LName" placeholder="subject Name">
                            @error('subject_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Language</label>
                            <input type="text" name="language" class="form-control" value="{{ $book->language }}" id="LName" placeholder="language">
                            @error('language')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">status</label>
                            <input type="text" name="status" class="form-control" value="{{ $book->status }}" id="LName" placeholder="Book status">
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Number Of Pages</label>
                            <input type="text" name="numberOfPages"  class="form-control" id="LName" placeholder="number of pages">
                            @error('numberOfPages')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Publish Date</label>
                            <input type="text" name="publish_date" class="form-control" id="LName" placeholder="publish Date">
                            @error('publish_date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 ">
                        <div class="mb-3">
                            <label for="LName" class="form-label">Total Copy</label>
                            <input type="text" name="total_copy" class="form-control" id="LName" placeholder="Total copy">
                            @error('total_copy')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book Author</label>
                            <br>
                            <select name="author_id" id="author->id" class="form-control">
                                <option>Select Author</option>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->Fname }} {{ $author->Lname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book publishers</label>
                            <br>
                            <select name="publishers_id" id="publishers->id" class="form-control">
                                <option>Select publishers</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="">Book Category</label>
                            <br>
                            <select name="category_id" id="category->id" class="form-control">
                                <option>Select category</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    @else
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Books</h1>
        <a href="{{ route('admin.books.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Add Book</a>
    </div>

    <!-- Content Row -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Illustrations -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Book List</h6>
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
                                    <th>Book Name</th>
                                    <th>Author Name</th>
                                    <th>publishers</th>
                                    <th>Total Copy</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->author->Fname }} {{ $book->author->Lname }}</td>
                                        <td>{{ $book->publisher->publisher_name }}</td>
                                        <td>{{ $book->totalCopy }}</td>
                                        <td>
                                            <a href="{{ route('admin.books.edit', $book->id) }} " class="btn btn-success">
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
