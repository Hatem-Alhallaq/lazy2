@extends("admin.layout.app")

@section("title", "Manage News")

@section("content")

    <form class="mb-3">
        <div class="row">
            <div class="col-4">
                <input  class="form-control" type="text" name="q" id="q" value="{{request()->q}}">

            </div>
            <div class="col-2">
                <select class="form-control" name="published">
                    <option value="">Any Status</option>
                    <option value="1"{{request()->get('published')?"selected":""}}>Active</option>
                    <option value="0"{{request()->get('published')== '0'?"selected":""}}>Deactive</option>
                </select>
            </div>
            <div class="col-2">
                <select class="form-control" name="category">
                    <option value="">Any Category</option>
                   @foreach($categories as $category)
                        <option value="{{$category->id}}"{{$category->id == request()->get('category')?"selected":""}}>{{$category->name}}</option>
                       @endforeach


                </select>
            </div>
            <div class="col-2">
                <input type="submit" class="btn btn-info" value="Search" id="search">
            </div>
            <div class="col-2">
                <a href="{{ route("news.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New</a>
            </div>
        </div>
    </form>
    @if($news->count()>0)
    <table align="center" class="table table-striped mt-3 table-bordered">
        <thead>
        <tr>
            <th>title</th>
            <th>category Name</th>
            <th>details</th>
            <th>summery</th>
            <th>published</th>
            <th width="20%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $s_news)
            <tr>
                <td><a href="{{ route("news.show", $s_news->id) }}">{{ $s_news->title }}</a></td>
                <td>{{ $s_news->category->name }}</td>
                <td>{{ $s_news->details }}</td>
                <td>{{ $s_news->summary }}</td>
                <td>{{ $s_news->published }}</td>
                <td width="20%">
                    <form method="post" action="{{ route('news.destroy', $s_news->id) }}">
                        <a href="{{ route("news.show", $s_news->id) }}" class="btn btn-info btn-sm"><i
                                class='fa fa-eye'></i></a>

                        <a href="{{ route("news.edit", $s_news->id) }}" class="btn btn-primary btn-sm"><i
                                class='fa fa-edit'></i></a>


                        <button onclick='return confirm("Are you sure dude?")' type="submit"
                                class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
   @else
        <div class="alert alert-danger">
            <label> There Is No Result For Your Search</label>
        </div>
        @endif
    {{$news->links()}}
@endsection
