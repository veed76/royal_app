@extends('app')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">View Author</li>
  </ol>
</nav>
<div class="raw">
  <div class="col-md-12">
    <b>Name</b> : {{$autherdata['first_name'] . ' '.$autherdata['last_name']}} <br>
    <b>Birthday</b> : {{date("Y-m-d", strtotime($autherdata['birthday']))}} <br>
    <b>Gender</b> : {{$autherdata['gender']}} <br>
    <b>Place of birth</b> : {{$autherdata['place_of_birth']}} <br>

    @if (count($autherdata['books']) == 0)
    <form action="{{url('author/delete/'.$autherdata['id'])}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure ?')">Delete Author</button>
    </form>

    @endif<br>
    <br>
    <br>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Release date</th>
          <th scope="col">Description</th>
          <th scope="col">Isbn</th>
          <th scope="col">Format</th>
          <th scope="col">Number of pages</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($autherdata['books'] as $book)
        <tr>
          <th scope="row">{{$book['id']}}</th>
          <td>{{$book['title']}}</td>
          <td>{{$book['release_date']}}</td>
          <td>{{$book['description']}}</td>
          <td>{{$book['isbn']}}</td>
          <td>{{$book['format']}}</td>
          <td>{{$book['number_of_pages']}}</td>
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

@endsection