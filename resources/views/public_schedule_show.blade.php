@extends('layouts.app')

@section('content')

<div class="container text-center">
        <div class="row">
         <h1>{{$user->name}}さんの{{$plan->name}}の{{$schedule->event_category}}</h1>
         <hr>
        </div>
        
</div>
      
<div class="container text-center">

<div class="row">
  <div class="col-3">
            @if($schedule->image_name)
                                <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="...">
                            @else
                                <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                            @endif
</div>
<div class="col-1">
</div>
<div class="col-8">
</div>
</div>



@endsection