@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
  <div class="panel panel-default">
    <div class="panel-heading">
      View All {{$type}}s
    </div>
    <div class="panel-body">
      <dl>
        @foreach ($specific_swords as $sword)
        <dt>{{$sword->nickname}}</dt>
        @if ($sword->length)
        <dd><strong>Length:</strong> {{$sword->length}} in</dd>
        @endif
        @if ($sword->avg_width)
        <dd><strong>Average Width:</strong> {{$sword->avg_width}} in</dd>
        @endif
        @if($sword->weight)
        <dd><strong>Weight:</strong> {{$sword->weight}} lbs</dd>
        @endif
        @endforeach
      </dl>
  </div>
</div>
@endsection
