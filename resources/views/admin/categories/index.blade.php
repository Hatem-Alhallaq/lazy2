@extends("admin.layout.app")

@section("title","Categories")


@section("content")
    <form class="mb-3">
        <div class="row">
            <div class="col-8">
                <input  class="form-control" type="text" name="q" id="q" value="{{request()->q}}">
            </div>
            <div class="col-2">
                <input type="submit" class="btn btn-info" value="Search" id="search">
            </div>
            <div class="col-2">
                <a href="{{route('category.create')}}" class="btn btn-success">Create New Category</a>
            </div>
        </div>
    </form>
    @if($items->count()>0)
<table align="center" class="table mt-3 table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Show</th>
            <th>News Count</th>
            <th width="20%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td><input type="checkbox" disabled {{ $item->show?"checked":"" }} /></td>
            <td>{{ $item->news->count() }}
                <!--ul>
                    @foreach($item->news as $new_item)
                    <li>{{$new_item->title}}</li>
                    @endforeach
                </ul-->
            </td>
            <td width="20%">
                <form method="post" action="{{ route('category.destroy', $item->id) }}">
                    <a href="{{ route('category.show', $item->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                    <a href="{{ route("category.edit", $item->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

{{--                    <a href="" onclick='return confirm("Are you sure ?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>--}}

                    <button onclick='return confirm("Are you sure ?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")
                </form>
            </td>
{{--            <td>--}}
{{--            <a class='btn btn-info btn-sm'--}}
{{--            href="">Edit</a>--}}
{{--            <a class='btn btn-danger btn-sm'--}}
{{--            onclick='return confirm("Are you sure?")'--}}
{{--            href="">Delete</a>--}}

{{--            <!----}}
{{--            <a class='btn btn-danger btn-sm'--}}
{{--            onclick='return confirm("Are you sure?")'--}}
{{--            href=''>Delete</a>--}}


{{--            <a class='btn btn-danger btn-sm'--}}
{{--            onclick='return confirm("Are you sure?")'--}}
{{--            href='/category/delete/{{$item->id}}'>Delete</a>--}}
{{--            -->--}}
{{--            </td>--}}
        </tr>
        @endforeach

    </tbody>
</table>
    @else
        <div class="alert alert-danger">
            <label> There Is No Result For Your Search</label>
        </div>
    @endif
    {{$items->links()}}
@endsection
