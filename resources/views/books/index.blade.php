@extends('app')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Books</li>
  </ol>
</nav>


<div class="raw ">
  <div class="col-md-12" align="right"><a class="btn btn-primary" href="{{ route('create.book') }}">Create Book</a></div>
  <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Release date</th>
          <th scope="col">Isbn</th>
          <th scope="col">Format</th>
          <th scope="col">Number of pages</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($books['items'] as $book)
        <tr>
          <th scope="row">{{$book['id']}}</th>
          <td>{{$book['title']}}</td>
          <td>{{date("Y-m-d", strtotime($book['release_date']))}}</td>
          <td>{{$book['isbn']}}</td>
          <td>{{$book['format']}}</td>
          <td>{{$book['number_of_pages']}}</td>
          <td><a type="button" class="btn btn-info" href={{url('books/'.$book['id'])}}>View</a></td>
          <td>
            <form action="{{url('book-delete/'.$book['id'])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <th>No data found</th>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection