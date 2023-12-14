@extends('frontend.master')
@section('content')

<!-- about breadcrumb -->
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
        <ul class="breadcrumbs-custom-path mb-sm-3 mb-2 text-center">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Post Details Page </li>
        </ul>
        <h3 class="title-big">{{ $postDetails->title }}</h3>
    </div>
</div>
<!-- about breadcrumb -->
<section class="w3l-blog-single1 py-5">
    <div class="container py-lg-3">

        <div class="text2">
            <p class="text2-text mb-4">{{ $postDetails->short_description }}</p>
        </div>
        <div class="text-bg-image">
            <img src="{{  asset('/post/'.$postDetails->image)}}" alt="" class="img-fluid radius-image w-full" >
        </div>
        <div class="text-content-text mb-5">
            <div class="d-grid-2">
                <div class="text2 mt-4">
                    <h3 class="title-left">Who We Are and What We Stand for</h3>
                    <p class="mt-3">{!! $postDetails->short_description !!}</p>
                   
                </div>
            </div>
        </div>

          <!-- ===============Comment show section start===================== -->
          @if ($postDetails && $postDetails->comments)
          @foreach($postDetails->comments as $comment)
              <div class="card ">
                  <div class="card-body">
                      <p>Name: {{ $comment->name }}</p>
                      <p>Message: {{ $comment->message }}</p>
                  </div>
              </div>
          @endforeach
      @else
          <p>No comments available.</p>
      @endif
      
        
    
      
       
      
          <!-- ===============Comment section start===================== -->
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <!-- Comment Form Card -->
                <div class="card comment-card">
                  <div class="card-body">
                    <h4 class="card-title">Leave a Comment</h4>

                    @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
          
                    <!-- Comment Form -->
                    <form action="{{ route('post.comment', $postDetails->id) }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                      </div>
                      <div class="form-group">
                        <label for="comment">Your Comment:</label>
                        <textarea class="form-control" name="message" id="comment" rows="3" placeholder="Enter your comment"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>            
                  </div>
                </div>
              </div>
            </div>
          </div>

          
    </div>
</section>

@endsection