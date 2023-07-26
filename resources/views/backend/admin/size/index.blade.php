@extends('backend.admin.layouts.dashboard_master')


@section('title')
    Sizes
@endsection


@php
    $page = 'Sizes';
@endphp


@section('mainsection')
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary">Sizes</h5>

            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addSizeModal">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Add Size
            </button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($sizes as $key => $size)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $size->name }}</td>
                                <td>{{ $size->status }}</td>
                                <td>{{ $size->created_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal"
                                            data-target="{{ '#edit' . $size->id . 'SizeModal' }}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('size.destroy', $size->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="delete btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            <!-- Size Edit & Update Modal-->
                            <div class="modal fade" id="{{ 'edit' . $size->id . 'SizeModal' }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>{{ $size->name }}</b>
                                            </h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>

                                        <!-- Update form -->
                                        <form action="{{ route('size.update', $size->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="size_name">Size Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $size->name }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                                                <button class="btn btn-primary" type="submit">Update Size</button>
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



    <!-- Size Add Modal-->
    <div class="modal fade" id="addSizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a New Size</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>


                <form action="{{ route('size.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="size_name">Size Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" type="submit">Add Size</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
