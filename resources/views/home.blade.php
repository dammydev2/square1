@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <h1 class="text-black-50"> -->

    <div class="container col-md-12">
        <a href="{{ url('add-blog') }}" class="btn btn-primary"><i class="fas fa-plus">Add a post</i></a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th><a href="{{ Request::url() }}">Date Created</a></th>
            </tr>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->description }}</td>
                <td>{{ $blog->created_at }}</td>
            </tr>
            @endforeach

            {{ $blogs->appends(Request::query())->render() }}

        </table>
    </div>

    <!-- </h1> -->
</div>
@endsection