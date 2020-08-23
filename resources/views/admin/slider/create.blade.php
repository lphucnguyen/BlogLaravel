@extends('layouts.admin.app')

@section('title', 'Slider')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Slider</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sliderTitle">Slider Title: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="sliderTitle" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="link">Link: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="link" name="link">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="sliderName">Slider Name: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control-file" id="sliderName" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="isPublish">Publish: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="published" id="isPublish">
                                            <option value="1">Publish</option>
                                            <option value="0">Not Publish</option>
                                        </select>                                    
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
