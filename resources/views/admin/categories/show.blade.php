@extends("admin.layout.app")

@section("name",  $category->title )

@section("content")
<form role="form">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input value='{{ $category->name }}' type="text" readonly class="form-control" id="name" name="name" placeholder="Enter City Name">
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col">
                <div class="form-group">
                    <label for="show">Show</label>
                    <input  {{ $category->show?"checked":"" }} readonly type="checkbox" class="form-controshow" id="show" name="show">
                </div>
            </div>
        </div>

    <div class="card-footer">
        <a class='btn btn-default' href='{{ route("category.index") }}'>Cancel</a>
    </div>
</form>
@endsection
