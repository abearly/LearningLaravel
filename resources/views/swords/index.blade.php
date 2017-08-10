@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading">
      Existing Sword Types
    </div>
    <div class="panel-body">
      <ul>
        @foreach ($swords as $sword)
        <li>{{ $sword->name }}</li>
        @endforeach
      </ul>
    </div>
    <div class="panel-heading">
      Create a New Sword Type
    </div>
    <div class="panel-body">
      @include('common.errors')
      <form action="{{ url('swords') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Sword Name -->
        <div class="form-group">
          <div class="row">
            <label for="sword-name" class="col-sm-3 control-label">Type</label>
            <div class="col-sm-6">
              <input type="text" name="name" id="sword-name" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <label for="sword-curved" class="col-sm-3 control-label">Curved?</label>
          <div class="col-sm-6">
            <input type="radio" name="curved" value="Curved"> Curved<br>
            <input type="radio" name="curved" value="Not Curved"> Not Curved<br>
          </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Sword Type
                </button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
