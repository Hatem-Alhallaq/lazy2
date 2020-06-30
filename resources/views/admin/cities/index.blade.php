@extends("admin.layout.app")

@section("title", "Manage City")

@section("content")

<a href="{{ route("city.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New</a>
<table align="center" class="table table-striped mt-3 table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Country Name </th>
            <th>Lat Lang</th>
            <th>Active</th>
            <th width="20%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($City as $City)
        <tr>

            <?php

          //  $country_name =  DB::table('countries')->select('name')->where("id",$City->country_id)->first();
            ?>
            <td><a href="">{{ $City->name }}</a></td>
{{--            <td> {{$country_name->name }}</td>--}}
            <td> {{$City->country->name }}</td>

{{--                @foreach($Country as $Country)--}}
{{--                    @if($Country->id == $City->country_id)--}}
{{--                        $country_name =--}}
{{--                        @endforeach--}}

            <td>{{ $City->latlang }}</td>
            <td>{{ $City->active }}</td>
            <td width="20%">
                <form method="post" action="{{ route('city.destroy', $City->id) }}">
                    <a href="{{ route('city.show', $City->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                    <a href="{{ route("city.edit", $City->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                    <a href="{{ route("delete-city", $City->id) }}" onclick='return confirm("Are you sure ?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>

                    <button onclick='return confirm("Are you sure ?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
