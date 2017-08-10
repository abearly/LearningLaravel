@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading">
      Add a New Sword
    </div>
    <div class="panel-body">
      @include('common.errors')
      <form action="{{ url('admin/add-sword')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Sword Type -->
        <div class="form-group">
          <div class="row">
            <label for="sword-type" class="col-sm-3 control-label">Sword Type <span class="required">*</span> </label>
            <div class="col-sm-6">
              @foreach ($types as $type)
              <input type="radio" id="sword-type" name="sword_id" value="{{ $type->id }}">{{ $type->name }}<br>
              @endforeach
            </div>
          </div>
          <div class="row">
            <label for "nickname" class="col-sm-3 control-label">Provide a Nickname <span class="required">*</span> </label>
            <div class="col-sm-6">
              <input type="text" name="nickname" id="nickname" class="form-control">
            </div>
          </div>
          <div class="row">
            <label for="length" class="col-sm-3 control-label">What is the Sword's Length?</label>
            <div class="col-sm-5">
              <input type="number" step=".01" name="length" id="length" class="form-control"> inches
            </div>
          </div>
          <div class="row">
            <label for="avg-width" class="col-sm-3 control-label">What is the Blade's Average Width?</label>
            <div class="col-sm-5">
              <input type="number" step=".01" name="avg_width" id="avg-width" class="form-control"> inches
            </div>
          </div>
          <div class="row">
            <label for="weight" class="col-sm-3 control-label">What is the Sword's Weight</label>
            <div class="col-sm-5">
              <input type="number" step=".01" name="weight" id="weight"> lbs
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-plus"></i> Add
            </button>
          </div>
        </div>
      </form>
      <div class="panel panel-heading" style="margin-top:10px">
        Existing Swords
      </div>
      <div class="panel-body">
        <table>
          <tr>
            <th>Nickname</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
          @foreach ($specifics as $specific)
          <tr>
            <td>{{ $specific->nickname }}</td>
            <td>{{ $specific->name }}</td>
            <td><a href="{{ url('add-sword/'.$specific->id)}}">View Details</a></td>
            <td>
              <form action="{{ url('delete-sword/'.$specific->id)}}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="modal-footer no-border">
                  <button type="submit" id="delete-sword-{{$specific->id}}" class="btn btn-primary">Delete</button>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
