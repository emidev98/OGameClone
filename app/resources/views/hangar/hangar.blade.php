@extends('app')

@section('content')
<div id="hangar" class="container card">
  @if (!$planet->has_hangar)
    <div id="create-hangar-section">
      <p id="create-hangar-text"><b>If you create an hangar you will be able to build your fleet. Then you can make travels to attack, spy, transport, colonize or deploy people on other planets.</b></p>
      <div id="create-hangar-button">
        <a href="{{route('create-hangar', $planet)}}">Create Hangar</a>
      </div>
    </div>
  @else
    <div>

    <div>
  @endif
</div>
@endsection
