@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <h1 class="text-black-50"> -->

    <div class="container col-md-12">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="{{ url('home') }}" class="btn btn-primary">View my blog post</a>
            <h3>Add a post</h3>
            <form action="{{ url('create-blog') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="">Title</label><br>
                    <input type="text" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" placeholder="title" name="title" id="" />
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label><br>
                    <textarea name="description" id="" class="form-control @error('title') is-invalid @enderror">{{ old('description') }}</textarea>
                    <!-- <input type="text" value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control" placeholder="title" name="title" id="" /> -->
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Add post">

            </form>
        </div>

    </div>

    <!-- </h1> -->
</div>
@endsection