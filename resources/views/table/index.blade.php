@extends('bootstrap.template')

@section('konten')
    <h1>holla</h1>
    <a href="{{ url('table/create') }}" class="btn btn-primary" >Add data</a><br>

    <form class="d-flex" action='{{  url('table') }}' method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" name="cari" value="{{ Request::get('cari') }}" aria-label="search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

    <?php $i = $data->firstItem() ?>
    @foreach ($data as $item)
        <tr>
            <td>{{$i}}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->age }}</td>
            <td>{{ $item->hobby }}</td>
            <td>
            <a href="{{ url('table/'.$item->name.'/edit') }}" class="btn btn-warning btn-sm">edit</a>
            <form onsubmit="return confirm('delete data?')" action="{{ url('table/'.$item->name) }}" class="d-inline" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">delete</button>
            </form>
        </td>
        </tr><br>
        <?php $i++ ?>
    @endforeach
    {{$data->links()}}
@endsection
     




