@extends("admin.layout.app")

@section("title", "Edit City")

@section("content")
<form role="form" method="post" action="{{ route("city.update", $city->id) }}">
        <!--input type="hidden" name="_method" value="PUT" /-->
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">City Name</label>
                    <input value='{{ $city->name }}' type="text" class="form-control" id="name" name="name" placeholder="Enter City Name">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select name="country_id" class="form-control">
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
                    <label for="latlang">LatLang</label>
                    <input value='{{ $city->latlang }}' type="text" class="form-control" id="latlang" name="latlang" placeholder="Enter LatLang">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="active">Active</label>
                    <input value='{{ $city->active }}' type="checkbox" class="form-control" id="active" name="active" >
                </div>
            </div>
        </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("city.index") }}'>Cancel</a>
    </div>
</form>
@endsection
