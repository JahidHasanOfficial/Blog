@extends('backend.master')
@section('content')

<div class="container">
    <div class="card">
        .<div class="card">
            <div class="card-header">
                Category
            </div>
            @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                   <div class="form-group">
                    <label for="">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="category name" required>
                   </div>
                   <button type="submit" class="btn btn-sm btn-info ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

