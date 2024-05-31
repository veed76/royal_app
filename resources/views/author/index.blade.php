@extends('app')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Authors</li>
  </ol>
</nav>




<div class="raw">
@if($errors->any())  
<div class="alert alert-danger" role="alert">
    
    {{$errors->first()}}
    
  </div>
  @endif
  <div class="col-md-12">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Birthday</th>
          <th scope="col">Gender</th>
          <th scope="col">Place Of Birth</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($authors['items'] as $auther)
        <tr>
          <th scope="row">{{$auther['id']}}</th>
          <td>{{$auther['first_name']}}</td>
          <td>{{$auther['last_name']}}</td>
          <td>{{date("Y-m-d", strtotime($auther['birthday']))}}</td>
          <td>{{$auther['gender']}}</td>
          <td>{{$auther['place_of_birth']}}</td>
          <td><a type="button" class="btn btn-info" href={{url('authors/'.$auther['id'])}}>View</a></td>
          <td>
            <form action="{{url('author/delete/'.$auther['id'])}}" method="POST">
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