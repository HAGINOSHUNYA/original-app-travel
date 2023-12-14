<div class="row text-center" id="travel" >
  <form action="{{route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan])}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="観光">
    <hr>
    <label>施設名</label>
    <input type="text" class="form-control" name="place" value="{{$schedule->place}}">
    <hr>
    <select name="way" id="way" class="form-control">
      <option>--- ジャンル ---</option>
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
    <label>到着予定時刻</label>
    <input type="date" class="form-control text-center" name="start_day" value="{{$day}}">
    <input type="time" class="form-control" name="start_time" value="{{$time}}">
    <hr>
    <label>予約状況</label>
    <input type="checkbox" class="form-control" name="reservation" value="{{$schedule->reservation}}">
    <hr>
    <label>到着場所</label>
    <input type="text" class="form-control" name="end_place" value="{{$schedule->end_place}}">
    <hr>
    <label>終了予定時刻</label>
    <input type="time" class="form-control" name="end_time" value="{{$schedule->end_time}}">
    <hr>
    <label>画像</label>
    <input type="file" name="image">
    <hr>
    <label>コメント</label>
    <input type="text" class="form-control" name="comment" autofocus  placeholder="必要なもの・注意点・魅力など！" value="{{$schedule->comment}}">
    <hr>
    <label for="switch" class="switch_label"  onchange="ball();">
      <div class="switch">
        <input type="checkbox" id="switch" name="recommend_flag" {{ old('recommend_flag', false) ? 'checked' : '' }}/>
          <div class="circle"></div>
          <div class="base"></div>
      </div>
      <span class="title">おすすめ非公開</span>
    </label>


    <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  </form>
</div>
<!--観光の場合終了--> 





{{--
<!--観光の場合開始-->
<div id="travel" style="max-width: 800px;" style="display:none;max-width:750px">
<form action="{{route('schedule_updata', ['schedule' => $schedule, 'plan' => $plan])}}" method="post">
@csrf
<input type="hidden" name="event_category" value="観光">
<select name="way" id="way" class="form-control">
 <option>--- 何を ---</option>
      <option value="居酒屋">居酒屋</option>
      <option value="ファミレス">ファミレス</option>
      <option value="中華">中華</option>
      <option value="フレンチ">フレンチ</option>
      <option value="イタリアン">イタリアン</option>
      <option value="和食">和食</option>
      <option value="洋食">洋食</option>
      <option value="寿司">寿司</option>
      <option value="レストラン">レストラン</option>
      <option value="焼肉">焼肉</option>
      <option value="ファストフード">ファストフード</option>
</select>

<input type="time" class="form-control" name="start_time">出発時刻
<input type="text" class="form-control" name="place">場所
<input type="checkbox" class="form-control" name="reservation" value="ture">予約
<input type="text" class="form-control" name="end_place">到着場所
<input type="time" class="form-control" name="end_time">到着時刻
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
<!--観光の場合終了-->--}}