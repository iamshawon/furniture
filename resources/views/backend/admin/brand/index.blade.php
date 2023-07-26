@extends('backend.admin.layouts.dashboard_master')


@section('title')
    Brands
@endsection


@php
    $page = 'Brands';
@endphp


@section('mainsection')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Brands</h5>

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addBrandModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Add Brand
            </button>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $key => $brand)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{ asset('images/backend/brand_images/' . $brand->image) }}" alt="brand_image"
                                        style="width: 80px">
                                </td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->description }}</td>

                                <td>{{ $brand->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                            data-target="{{ '#edit' . $brand->id . 'BrandModal' }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('brand.destroy', $brand->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="delete btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            <!-- Brand Edit & Update Modal-->
                            <div class="modal fade" id="{{ 'edit' . $brand->id . 'BrandModal' }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>{{ $brand->name }}</b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <!-- Update form -->
                                        <form action="{{ route('brand.update', $brand->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="brand_name">Brand Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $brand->name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="brand_image">Brand Image</label>
                                                    <input type="file" class="form-control-file" name="image">
                                                    <input type="hidden" name="old_thumb" value="{{ $brand->image }}">

                                                    <img class="mt-2"
                                                        src="{{ asset('images/backend/brand_images/' . $brand->image) }}"
                                                        alt="" style="width: 100px">
                                                    <strong>{{ $brand->image }}</strong>
                                                </div>



                                                <div class="form-group">
                                                    <label for="brand_description">Brand Description</label>
                                                    <textarea class="summernote form-control @error('description') is-invalid @enderror" name="description" rows="5">{{ $brand->description }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                                <button class="btn btn-primary" type="submit">Update Brand</button>
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




    <!-- Brand Add Modal-->
    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a New Brand</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="brand_name">Brand Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="brand_name">Brand Image</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="brand_description">Brand Description*</label>
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
                        <button class="btn btn-primary" type="submit">Add Brand</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
