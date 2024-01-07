<!--食事の場合開始-->
<div id="eat" style="max-width: 800px;">
<form action="{{route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan])}}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<input type="hidden" name="event_category" value="食事"/>
    <hr>
    <label>タイトル</label>
    <input type="text" class="form-control text-center" id="title" name="title" value="{{ $schedule->title }}">
    <hr>
    <label>店名</label>
    <input type="text" class="form-control text-center" id="place" name="place" value="{{ $schedule->place }}">
    <hr>
    <select   name="way" id="way" class="form-control text-center">
    <option>--- 選択してください ---</option>
      <option value="居酒屋" {{ $schedule->way == '居酒屋' ? 'selected' : '' }}>居酒屋</option>
      <option value="ファミレス" {{ $schedule->way == 'ファミレス' ? 'selected' : '' }}>ファミレス</option>
      <option value="中華" {{ $schedule->way == '中華' ? 'selected' : '' }}>中華</option>
      <option value="フレンチ" {{ $schedule->way == 'フレンチ' ? 'selected' : '' }}>フレンチ</option>
      <option value="イタリアン" {{ $schedule->way == 'イタリアン' ? 'selected' : '' }}>イタリアン</option>
      <option value="和食" {{ $schedule->way == '和食' ? 'selected' : '' }}>和食</option>
      <option value="洋食" {{ $schedule->way == '洋食' ? 'selected' : '' }}>洋食</option>
      <option value="寿司" {{ $schedule->way == '寿司' ? 'selected' : '' }}>寿司</option>
      <option value="レストラン" {{ $schedule->way == 'レストラン' ? 'selected' : '' }}>レストラン</option>
      <option value="焼肉" {{ $schedule->way == '焼肉' ? 'selected' : '' }}>焼肉</option>
      <option value="ファストフード" {{ $schedule->way == 'ファストフード' ? 'selected' : '' }}>ファストフード</option>
    </select>
    <hr>
    <select name="reservation" id="reservation" class="form-control text-center">
    <option>--- 予約状況 ---</option>
    <option value="true" {{ $schedule->reservation ? 'selected' : '' }}>予約済み</option>
    <option value="false" {{ !$schedule->reservation ? 'selected' : '' }}>未予約</option>
    </select>
    <hr>
    
    <label>予定開始時刻</label>
    <input type="date" class="form-control text-center" name="start_day" value="{{$day}}">
    <input type="time" class="form-control text-center" name="start_time" value="{{$time}}">
    <hr>
    <label>予定終了時刻</label>
    <input type="time" class="form-control text-center" name="end_time" value="{{$end_time}}">
    <hr>
    <label>値段</label>
    <input type="text" class="form-control" name="cost" value="{{$schedule->cost}}">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item" value="{{$schedule->item}}">
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
    <input type="text" class="form-control" name="comment">
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














{{--
<select name="way" id="way" class="form-control">
 <option>{{$schedule->way}}</option>
      <option value="自家用車">自家用車</option>
      <option value="レンタカー">レンタカー</option>
</select>
<label>出発時刻</label>
<input type="time" class="form-control" name="start_time" value="{{$schedule->start_time}}">
<label>出発場所</label>
<input type="text" class="form-control" name="start_place" value="{{$schedule->start_place}}">
<label>到着時刻</label>
<input type="time" class="form-control" name="end_time" value="{{$schedule->end_time}}">
<label>到着場所</label>
<input type="text" class="form-control" name="end_place" value="{{$schedule->end_place}}">
<br>
<label>画像</label>
<input type="file" name="image" class="form-control" value="{{$schedule->image_name}}">
<label for="switch" class="switch_label"  onchange="ball();">
  <div class="switch">
    <input type="checkbox" id="switch" name="recommend_flag" {{ old('recommend_flag', false) ? 'checked' : '' }}/>
    <div class="circle"></div>
    <div class="base"></div>
  </div>
  <span class="title">おすすめ非公開</span>
</label>
<br>
<input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
</form>
   

</div>

<!--食事の場合終了-->--}}