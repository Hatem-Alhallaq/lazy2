@extends("admin.layout.app")

@section("title", "Create City")

@section("content")
<form method="post" action="{{ route('city.store') }}" role="form">
    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">City Name</label>
                <input value='{{ old('name') }}' type="text" autofocus class="form-control" id="name" name="name" placeholder="Enter City Name">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="country_id">City</label>
                <select name="country_id" class="form-control">
                    <option>Select City</option>
                    @foreach($Country as $Country)
                        <option {{old('country_id')==$Country->id?"selected":""}} value='{{$Country->id}}'> {{$Country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="old_price">LatLang</label>
                <input value='{{ old('latlang') }}' type="text" class="form-control" id="latlang" name="latlang" placeholder="Enter LatLang">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="new_price">Active</label>
                <input value='{{ old('active') }}' type="checkbox" class="form-control" id="active" name="active" >
            </div>
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
</form>
@endsection
