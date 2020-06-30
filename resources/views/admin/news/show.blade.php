@extends("admin.layout.app")

@section("title",  $news->title )

@section("content")
<form role="form">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">News Name</label>
                    <input value='{{ $news->title }}' type="text" readonly class="form-control" id="title" name="title" placeholder="Enter News Title">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="categories_id">Category</label>
                    <select disabled name="categories_id" class="form-control">
                        <option>Select Category</option>
                        @foreach($categories as $category)

                            <option  {{$news->category_id == $category->id ?"selected":""}} value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <input value='{{ $news->summary }}' readonly type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="Publieshed">Published</label>
                    <input  {{ $news->published?"checked":"" }} readonly type="checkbox" class="form-controshow" id="Publieshed" name="Publieshed">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="details">Details</label>
            <textarea readonly class="form-control" id="details" name="details">{{ $news->details }}</textarea>
        </div>

    <div class="card-footer">
        <a class='btn btn-default' href='{{ route("news.index") }}'>Cancel</a>
    </div>
</form>
@endsection
