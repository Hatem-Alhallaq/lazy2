@extends("admin.layout.app")

@section("title","Edit Category")


@section("content")


    <form method="post" action="{{ route('category.update', $category->id) }}" role="form">
        @method('PATCH')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Category</label>
                <input value='{{old('name')??$category->name}}' type="text" autofocus
                       class="{{ $errors->has('name')?"is-invalid":""}} form-control" id="name" name="name"
                       placeholder="Enter Category Name">
            </div>
            <div class="form-check">
                <input {{ (old('show')??$category->show)?"checked":"" }}  type="checkbox" name='show'
                       class="form-check-input" id="show">
                <label class="form-check-label" for='show'>Show</label>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ asset("/category") }}'>Cancel</a>
        </div>
    </form>
@endsection
