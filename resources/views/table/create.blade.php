@extends('bootstrap.template')

@section('konten')

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
<a href="{{ url('table') }}" class="btn btn-danger">Back</a><br>
<form action="{{ url('table') }}" method="POST">
@csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="text" name="name" class="form-control" id="name" placeholder=""> <br>
    
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="text" name="age" class="form-control" id="age" placeholder=""> <br>
    
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="text" name="hobby" class="form-control" id="hobby" placeholder=""> <br>
    
      </div>
      
      <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
</form>

@endsection




