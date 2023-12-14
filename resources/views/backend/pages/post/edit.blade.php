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
            <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_id">Select A Category:</label>
                    <select name="category_id" class="form-control">
                        <option selected disabled>Select A Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="Post title" required>
                </div>
                <div class="form-group">
                    <label for="short_description">Short_description:</label>
                    <textarea name="short_description" class="form-control" rows="5" placeholder="Short description">{{ $post->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="long_description">Long_description:</label>
                    <textarea name="long_description" class="form-control" id="summernote" rows="5" >{{ $post->long_description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" class="form-control" required>
                    <img src="{{ asset('/post/'. $post->image) }}" alt="" height="80" width="50">
                </div>
                <button type="submit" class="btn btn-sm btn-info ">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            placeholder: "Long description",   
        });
    });
</script>
@endpush
