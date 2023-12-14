@extends('backend.master')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            Category
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Title</th>
                        <th>Shor description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ Str::substr($post->title, 0, 20) }}</td>
                            <td>{{ Str::substr($post->short_description, 0, 50) }}</td>
                            <td>
                                <img src="{{ asset('/post/' .$post->image) }}" alt="" width="" height="" style="width: 100px; height:70px;">
                            </td>
                            <td>
                                <a href="{{ url('/post/edit/'.$post->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('/post/delete/'.$post->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
