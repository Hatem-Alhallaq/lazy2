@extends("admin.layout.app");

@section('title','All Countries')
@section('content')

<a class="btn btn-success" href="{{route('create_new_country')}}">Add New</a>
    <table class="table table-striped">

        <thead>

        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Iso</th>
            <th scope="col">Code</th>
            <th scope="col">Area</th>
            <th scope="col">Population</th>
            <th scope="col" width="25%"></th>

        </tr>

        </thead>
        <tbody>
        @foreach($item as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->iso}}</td>
                <td>{{$item->code}}</td>
                <td>{{$item->area}}</td>
                <td>{{$item->population}}</td>
                <td><a class="btn btn-danger" href="{{route('delete-country',$item->id)}}" onclick="return confirm ('Are you sure you want to delete?')">Delete</a></td>
                <td><a class="btn btn-info" href="{{route('Update-country',$item->id)}}" >Update</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
