@extends('backend.admin.layouts.dashboard_master')


@section('title')
    Sub Categories
@endsection


@php
    $page = 'Sub Categories';
@endphp


@section('mainsection')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Sub Categories</h5>

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCategoryModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Add Sub Category
            </button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subCategories as $key => $subCategory)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $subCategory->name }}</td>
                                <td>{{ $subCategory->description }}</td>
                                <td>{{ $subCategory->status }}</td>
                                <td>{{ $subCategory->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                            data-target="{{ '#edit' . $subCategory->id . 'CategoryModal' }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('sub-category.destroy', $subCategory->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="delete btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            <!-- Sub Category Edit & Update Modal-->
                            <div class="modal fade" id="{{ 'edit' . $subCategory->id . 'CategoryModal' }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update:<b>
                                                    {{ $subCategory->name }}</b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <!-- Update form -->
                                        <form action="{{ route('sub-category.update', $subCategory->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="subCategory_name">Sub Category Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $subCategory->name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="subCategory_description">Sub Category Description</label>
                                                    <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ $subCategory->description }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                                <button class="btn btn-primary" type="submit">Update Sub Category</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- End DataTales -->



    <!-- Sub Category Add Modal-->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a New Sub Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <form action="{{ route('sub-category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="service_category_id">Select Category</label>
                            <select name="category_id" class="form-control">

                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="subCategory_name">Sub Category Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subCategory_description">Sub Category Description*</label>
                            <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description"
                                rows="5">
                                {{ old('description') }}
                            </textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" type="submit">Add Sub Category</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
