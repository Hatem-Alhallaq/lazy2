@extends("admin.layout.app");

@section('title','Add New')
@section('content')

    <form method="post" action="{{route('post-create-country')}}" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{old('name')}}"  class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="name" name="name" placeholder="Enter Name ">
            </div>
            <div class="form-group">
                <label for="iso">ISO</label>
                <input type="text" value="{{old('iso')}}"  class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="iso" name="iso" placeholder="Enter ISO ">
            </div>
            <div class="form-group">
                <label for="code">Post Code</label>
                <input type="number" value="{{old('code')}}"  class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="code" name="code" placeholder="Enter Post Code ">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="number" value="{{old('area')}}"  class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="area" name="area" placeholder="Enter Post Area ">
            </div>
            <div class="form-group">
                <label for="population">Population</label>
                <input type="number" value="{{old('population')}}"  class="{{ $errors->has('title')?"is-invalid":""}} form-control" id="population" name="population" placeholder="Enter Post Population ">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ asset("/country/all") }}'>Cancel</a>
        </div>
    </form>



@endsection
