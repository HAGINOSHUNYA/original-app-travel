<!--移動の場合開始-->
<div id="move">
 <form action="{{ route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan]) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('put')


      
<input type="hidden" name="event_category" value="移動">
      

<select name="way" id="way" class="form-control">
 <option value="{{$schedule->way}}">{{$schedule->way}}</option>
      <option value="自家用車">自家用車</option>
      <option value="レンタカー">レンタカー</option>
      <option value="公共交通機関">公共交通機関</option>
</select>
<label>出発時刻</label>
<input type="date" class="form-control text-center" name="start_day" value="{{$day}}">
<input type="time" class="form-control" name="start_time" value="{{$time}}">

<label>出発場所</label>

<input type="text" class="form-control" name="start_place" value="{{$schedule->start_place}}">

<label>到着時刻</label>
<input type="time" class="form-control" name="end_time" value="{{$schedule->end_time}}">

<label>到着場所</label>
<input type="text" class="form-control" name="end_place" value="{{$schedule->end_place}}">
<br>
<div class="card mb-3" style="max-width: 800px;">
  <div class="row g-0">
    <div class="col-md-4">
    @if($schedule->image_name)
                    <img src="https://app-travel-buket.s3.ap-northeast-1.amazonaws.com/{{ $schedule->image_name }}" class="img-fluid rounded-start" alt="..." style="height: 200px;width:300px; ">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 200px;width:300px;">
                @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <label>画像</label>
      <input type="file" name="image" class="form-control" value="{{$schedule->image_name}}">
      </div>
    </div>
  </div>
</div>




<label for="switch" class="switch_label" class="form-control text-center" onchange="ball();">
  <div class="switch">
    <input type="checkbox" id="switch" name="recommend_flag" {{ isset($schedule) && $schedule->recommend_flag ? 'checked' : '' }} />
    <div class="circle {{ isset($schedule) && $schedule->recommend_flag ? 'move_circle' : '' }}"></div>
    <div class="base"></div>
  </div>
  <span class="title">{{ isset($schedule) && $schedule->recommend_flag ? 'おすすめ公開' : 'おすすめ非公開' }}</span>
</label>
<br>

<input type="submit" name="submit" value="登録"  class="btn btn-primary"/>
</form>
   

</div>

<!--移動の場合終了-->