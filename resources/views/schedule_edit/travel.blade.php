<div class="row text-center" id="travel" >
  <form action="{{route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')


    <input type="hidden" name="event_category" value="観光">
    <hr>
    <label>施設名</label>
    <input type="text" class="form-control text-center" name="place" value="{{ $schedule->place }}">
    <hr>
    <select name="way" id="way" class="form-control text-center">
      <option value="{{$schedule->way}}">{{$schedule->way}}</option>
      <option value="講演会">講演会</option>
      <option value="ライブ">ライブ</option>
      <option value="レジャー施設">レジャー施設</option>
      <option value="見学">見学</option>
      <option value="体験">体験・ものづくり施設</option>
      <option value="温泉">温泉・スパ・リラクゼーション</option>
      <option value="遊園地・テーマパーク">遊園地・テーマパーク</option>
      <option value="動物園">動物園</option>
      <option value="水族館">水族館</option>
    </select>
    <hr>
    <select name="reservation" id="reservation" class="form-control text-center">
    <option>--- 予約状況 ---</option>
    <option value="true" {{ $schedule->reservation ? 'selected' : '' }}>予約済み</option>
    <option value="false" {{ !$schedule->reservation ? 'selected' : '' }}>未予約</option>
    </select>
    <hr>
    <label>到着予定時刻</label>
    <input type="date" class="form-control text-center" name="start_day" value="{{ $day }}">
    <input type="time" class="form-control text-center" name="start_time" value="{{ $time }}">
    <hr>
    <label>到着場所</label>
    <input type="text" class="form-control text-center" name="end_place" value="{{ $schedule->end_place }}">
    <hr>
    <label>終了予定時刻</label>
    <input type="time" class="form-control text-center" name="end_time" value="{{ $end_time }}">
    <hr>
    <label>値段</label>
    <input type="text" class="form-control text-center" name="cost" value="{{ $schedule->cost }}">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item" value="{{ $schedule->item }}">
    <hr>
  
    <label>コメント</label>
    <input type="text" class="form-control text-center" name="comment" autofocus  placeholder="必要なもの・注意点・魅力など！" value="{{ $schedule->comment }}">
    <hr>
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


    <input type="submit" name="submit" value="登録"  class="btn btn-primary"/>
  </form>
</div>
<!--観光の場合終了--> 




