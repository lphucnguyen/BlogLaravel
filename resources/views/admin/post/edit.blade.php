@extends('layouts.admin.app')

@section('title', 'Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
        </div>

        <!-- Content Row -->
        <form method="POST" action="{{ route('post.update', $postEdit->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">

                <div class="col-md-8">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="postName">Title: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="postName" name="title" value="{{ $postEdit->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <img style="width: 400px; height: 300px;" src="{{ $imageUrl }}" alt="Image">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="image">Image: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input id="image" type="file" class="form-control-file" name="image">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="categoryName">Category: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select type="text" class="selectpicker form-control" data-live-search="true" id="categoryName" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ ($postEdit->category_id == $category->id) ? 'selected' : '' }} >{{ $category->categoryName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="TagName">Tag: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select multiple name="tags_id[]" class="selectpicker form-control" id="tagName" data-live-search="true" >
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" {{ (in_array($tag->id, $tagsEdit)) ? 'selected' : ''  }}>{{ $tag->tagName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="categoryName">Publish: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select type="text" class="form-control" id="categoryName" name="published">
                                            <option value="0" {{ ($postEdit->published == 0) ? 'selected' : '' }}>Not Publish</option>
                                            <option value="1" {{ ($postEdit->published == 1) ? 'selected' : '' }}>Publish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button> 
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="shortDescription">Short Description: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="shortDescription" id="shortDescription" cols="30" rows="5">{!! $postEdit->shortDescription !!}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="content">Content: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="content" class="form-control" id="contentPost" cols="30" rows="10">{!! $postEdit->content !!}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
