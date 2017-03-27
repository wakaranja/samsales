@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-12">
    <h1>Listed Properties</h1>
    <a href="{{ route('add_property') }}"><button class="btn-primary btn-lg pull-right" name="button">New Property</button></a>
    <hr>
    <div class="col-md-12">
      {{ $properties->links() }}
    </div>

    <div class="col-md-10 col-md-offset-1">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Client</th>
            <th>Sale Type</th>
            <th>Date Registered</th>
            <th>Deal Status</th>
            <th>Image</th>
            <th>Review</th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
          @foreach($properties as $property )
          <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $property->name }}</td>
            <td>{{ $property->client }}</td>
            <td>{{ $property->sale_type }}</td>
            <td>{{ $property->date_registered }}</td>
            <td>{{ $property->deal_status }}</td>
            <td>{{ $property->review }}</td>
            <td> <img src="{{ asset('/propertyimages/'.$property->image) }}" alt="" width="150" height="100"></td>
            <td>
              <a href="{{ route('edit_property',['id'=>$property->id]) }}"> Edit</a>
              <a href="{{ route('delete_property',['id'=>$property->id]) }}" onclick="return confirm('Are you sure you want to delete this property?');"> Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><!--  Close Div holding the table -->


  <div class="col-md-12">
  {{ $properties->links() }}
  </div><!--  Close pagination -->

  </div><!--  Close Col-md-12 -->
</div><!--  Close Container -->
@endsection
