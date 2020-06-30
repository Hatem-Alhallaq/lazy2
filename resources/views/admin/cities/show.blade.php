@extends("admin.layout.app")

@section("name",  $city->name )

@section("content")
<form role="form">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input value='{{ $city->name }}' type="text" readonly class="form-control" id="name" name="name" placeholder="Enter City Name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select disabled name="country_id" class="form-control">
                        <option>Select Country</option>
                        @foreach($country as $country)
                            <option  {{$country->id == $city->country_id?"selected":""}} value='{{$country->id}}'>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="latlang">Old Price</label>
                    <input value='{{ $city->latlang }}' readonly type="text" class="form-control" id="latlang" name="latlang" placeholder="Enter LatLang">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="active">Active</label>
                    <input value='{{ $city->active }}' readonly type="checkbox" class="form-control" id="active" name="active">
                </div>
            </div>
        </div>

    <div class="card-footer">
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
</form>
@endsection
