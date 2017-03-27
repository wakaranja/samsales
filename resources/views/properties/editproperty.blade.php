@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Property</div>

                <div class="panel-body">
                  <form class="form-horizontal" action="{{ route('update_property',['id'=>$property->id]) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="col-md-2 control-label">Property Name: </label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="name" value="{{ $property->name }}">
                        @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('client') ? ' has-error' : '' }}">
                      <label for="client" class="col-md-2 control-label">Client:</label>
                      <div class="col-md-8">
                        <input class="form-control" type="text" name="client" value="{{ $property->client }}">
                        @if ($errors->has('client'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('client') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('sale_type') ? ' has-error' : '' }}">
                      <label for="status" class="col-md-2 control-label">Type of Sale: </label>
                      <div class="col-md-8">
                        <select name="sale_type" value="{{ $property->sale_type }}" class="form-control">
                          <option value="Cash" selected>Cash</option>
                          <option value="Hire Purchase">Hire Purchase</option>
                        </select>
                        @if ($errors->has('sale_type'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('sale_type') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('date_registered') ? ' has-error' : '' }}">
                    <label for="to" class="col-md-2 control-label">Date:</label>
                    <div class="col-md-8">
                    <input class="form-control" type="date" name="date_registered" value="{{ $property->date_registered }}">
                    @if ($errors->has('date_registered'))
                          <span class="help-block">
                              <strong>{{ $errors->first('date_registered') }}</strong>
                          </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('deal_status') ? ' has-error' : '' }}">
                    <label for="status" class="col-md-2 control-label">Deal Status: </label>
                    <div class="col-md-8">
                    <select name="deal_status" value="{{ $property->deal_status }}" class="form-control">
                      <option value="Pending" selected>Pending</option>
                      <option value="Closed">Closed</option>
                    </select>
                    @if ($errors->has('deal_status'))
                          <span class="help-block">
                              <strong>{{ $errors->first('deal_status') }}</strong>
                          </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image" class="col-md-2 control-label">Property Image:</label>
                    <div class="col-md-8">
                    <input class="form-control" type="file" name="image" value="">
                    @if ($errors->has('image'))
                          <span class="help-block">
                              <strong>{{ $errors->first('image') }}</strong>
                          </span>
                    @endif
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <img src="{{ asset('/propertyimages/'.$property->image)}}" alt="" class="img-responsive" width="100%">
                </div>


                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-2 control-label">Review:</label>
                    <div class="col-md-8">
                    <textarea class="form-control" name="review" rows="8" cols="80" placeholder="Property comments/review">{{ $property->review }}</textarea>
                    @if ($errors->has('review'))
                          <span class="help-block">
                              <strong>{{ $errors->first('review') }}</strong>
                          </span>
                    @endif
                  </div>
                </div>

                <div class="col-md-8">
                  <button type="submit" class="btn btn-primary btn-lg">Update Details</button>
                </div>

                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
