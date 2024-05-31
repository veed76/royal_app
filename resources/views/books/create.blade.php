@extends('app')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Create Book</li>
    </ol>
</nav>


<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{route('create.book')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author</label>
                <select class="form-control" name="author">
                    <option value="">Select Author</option>
                    @foreach ($authors['items'] as $auther)
                    <option value={{$auther['id']}}>{{$auther['first_name'].' '.$auther['last_name']}}</option>
                    @endforeach
                </select>
                @if($errors->has('author'))
                <div class="error text-danger">{{ $errors->first('author') }}</div>
                @endif
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
                @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Release date</label>
                <input type="datetime-local" class="form-control" name="release_date">
                @if($errors->has('release_date'))
                <div class="error text-danger">{{ $errors->first('release_date') }}</div>
                @endif

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description">
                @if($errors->has('description'))
                <div class="error text-danger">{{ $errors->first('description') }}</div>
                @endif

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">isbn</label>
                <input type="text" class="form-control" name="isbn">
                @if($errors->has('isbn'))
                <div class="error text-danger">{{ $errors->first('isbn') }}</div>
                @endif

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Format</label>
                <input type="text" class="form-control" name="format">
                @if($errors->has('format'))
                <div class="error text-danger">{{ $errors->first('format') }}</div>
                @endif

            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Number of pages</label>
                <input type="number" class="form-control" name="number_of_pages">
                @if($errors->has('number_of_pages'))
                <div class="error text-danger">{{ $errors->first('number_of_pages') }}</div>
                @endif

            </div>
            <a type="button" class="btn btn-secondry" href="{{route('books.index')}}">Go Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>
</div>
@endsection