@extends('backend.admin.layouts.dashboard_master')


@section('title')
    Colors
@endsection


@php
    $page = 'Colors';
@endphp


@section('mainsection')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Colors</h5>

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addColorModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Add Color
            </button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Color code</th>
                            <th>Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($colors as $key => $color)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->color_code }}</td>
                                <td>{{ $color->status }}</td>
                                <td>{{ $color->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                            data-target="{{ '#edit' . $color->id . 'ColorModal' }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('color.destroy', $color->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="delete btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            <!-- Color Edit & Update Modal-->
                            <div class="modal fade" id="{{ 'edit' . $color->id . 'ColorModal' }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>{{ $color->name }}</b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <!-- Update form -->
                                        <form action="{{ route('color.update', $color->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="color_name">Color Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $color->name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="color_color_code">Color Description</label>
                                                    <textarea class="summernote form-control @error('color_code') is-invalid @enderror" name="color_code" rows="5">{{ $color->color_code }}</textarea>
                                                    @error('color_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                                <button class="btn btn-primary" type="submit">Update Color</button>
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



    <!-- Color Add Modal-->
    <div class="modal fade" id="addColorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a New Color</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <form action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="color_name">Color Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="color_color_code">Color Description*</label>
                            <textarea class="summernote form-control @error('color_code') is-invalid @enderror" name="color_code"
                                rows="5">
                                {{ old('color_code') }}
                            </textarea>

                            @error('color_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" type="submit">Add Color</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
