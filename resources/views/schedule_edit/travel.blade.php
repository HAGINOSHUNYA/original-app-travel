 
<!--観光の場合開始-->
<div id="travel">
<form action="{{route('schedule_updata')}}" method="post">
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
<!--観光の場合終了-->