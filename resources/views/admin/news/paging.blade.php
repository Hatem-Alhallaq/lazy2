@extends("admin.layout.app")

@section("title", "Manage News Paging")

@section("content")
<a href="{{ route("news.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New</a>
<table align="center" class="table table-striped mt-3 table-bordered">
    <thead>
        <tr>
            <th>title</th>
            <th>category  Name</th>
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
            <td width="20%">    <form method="post" action="{{ route('news.destroy', $s_news->id) }}">
                    <a href="{{ route("news.show", $s_news->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                    <a href="{{ route("news.edit", $s_news->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>


                    <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{$news->links()}}
@endsection
