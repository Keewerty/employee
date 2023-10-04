@extends('bootstrap.template')

@section('konten')

<a href="{{ url('table') }}" class="btn btn-danger">Back</a><br>
@if ($errors->any())
    
<div class="pt">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
            @endforeach
        </ul>
    </div>
</div>
    
@endif

<form action="{{ url('table/'.$data->name) }}" method="POST">
@csrf
@method('PUT')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{$data->name}}"> <br>
    
        <label for="exampleFormControlInput1" class="form-label">Age</label>
        <input type="text" name="age" class="form-control" id="age" value="{{$data->age}}"> <br>
    
        <label for="exampleFormControlInput1" class="form-label">Hobby</label>
        <input type="text" name="hobby" class="form-control" id="hobby" value="{{$data->hobby}}"> <br>
    
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
</form>

@endsection




