<!--宿泊の場合開始-->
<div id="hotel" style="max-width: 800px;">
<form action="{{route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan])}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<input type="hidden" name="event_category" value="宿泊">
    <a href="{{route('rakuten.index')}}">ホテル検索</a><br>
    <hr style="margin: 0px;padding: 0px;">
    <label>タイトル</label>
    <input type="text" class="form-control" name="title" value="{{ $schedule->title }}">
    <hr>    
    <label>ホテル名</label>
    <input type="text" class="form-control" name="place" value="{{ $schedule->place }}">
    <hr>
    <label>ホテル住所</label>
    <input type="textarea" class="form-control" name="address" value="{{ $schedule->address }}">
    <hr>
    <select name="reservation" id="reservation" class="form-control text-center">
    <option>--- 予約状況 ---</option>
    <option value="true" {{ $schedule->reservation ? 'selected' : '' }}>予約済み</option>
    <option value="false" {{ !$schedule->reservation ? 'selected' : '' }}>未予約</option>
    </select>
    <hr>
    
    <label>チェックイン</label>
    <input type="date" class="form-control text-center" name="start_day" value="{{$day}}">
    <input type="time" class="form-control" name="start_time" value="{{$time}}">
    <hr>
    <label>チェックアウト</label>
    <input type="time" class="form-control" name="end_time" value="{{$end_time}}">
    <hr>    
    <label>値段</label>
    <input type="text" class="form-control" name="cost" value="{{ $schedule->cost }}">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item" value="{{ $schedule->item }}">
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



    <hr>
    <label>コメント</label>
    <input type="text" class="form-control" name="comment" value="{{ $schedule->comment }}">
    <hr>
    <label for="switch" class="switch_label" class="form-control text-center" onchange="ball();">
  <div class="switch">
    <input type="checkbox" id="switch" name="recommend_flag" {{ isset($schedule) && $schedule->recommend_flag ? 'checked' : '' }} />
    <div class="circle {{ isset($schedule) && $schedule->recommend_flag ? 'move_circle' : '' }}"></div>
    <div class="base"></div>
  </div>
  <span class="title">{{ isset($schedule) && $schedule->recommend_flag ? 'おすすめ公開' : 'おすすめ非公開' }}</span>
</label>
    <hr>
    <input type="submit" name="submit" value="登録"  class="btn btn-primary"/>
  </form>
</div>
<!--宿泊の場合終了-->
