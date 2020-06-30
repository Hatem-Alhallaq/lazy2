@extends("admin.layout.app")

@section("title", "Edit News")

@section("content")


<form role="form" method="post" enctype="multipart/form-data" action="{{ route("news.update", $news->id) }}">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">Product Name</label>
                    <input value='{{ $news->title }}' type="text" class="form-control" id="title" name="title" placeholder="Enter Product Title">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                            <option  {{$category->id ==  $news->category_id?"selected":""}} value='{{$category->id}}'>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="summary">Summary</label>
                    <input value='{{ $news->summary }}' type="text" class="form-control" id="summary" name="summary" placeholder="Enter Summary">
                </div>
            </div>
            <div class='col'>
                <label for="imageFile">Image</label>
                <div class="custom-file">
                    <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
                @if($news->image)
                    <img src='{{ asset("storage/".$news->image) }}' width='240' class='img-thumbnail mt-3' />
                @endif
            </div>
        </div>

    <div class="col">
        <div class="form-group">
            <label for="published">Published</label>
            <input  {{ old('published')  }}  {{ $news->published?"checked":"" }}  value="{{  $news->published }}" type="checkbox" class="form-controshow" id="published" name="published">
        </div>
    </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea class="form-control" id="details" name="details">{{ $news->details }}</textarea>
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("news.index") }}'>Cancel</a>
    </div>
</form>
@endsection
@section("js")
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
    @endsection
