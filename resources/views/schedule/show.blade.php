@extends('layouts.mypage')
@section('content')
onchange="viewChange();"
<div class="container text-center">
<form action="#" method="post">
      @csrf
 <input type="time" name="event_category" id="event_category"  for="event_category" class="form-control" value="{{$schedule->start_time}}"> 
</input>






      <input type="submit" name="submit" value="更新"  class="btn btn-primary"/>
</form>

</div>

@endsection