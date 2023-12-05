<!--食事の場合開始-->
<div class="row text-center" id="eat" style="display:none">
<form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="event_category" value="食事"/>

<label>店名</label>
<input type="text" class="form-control text-center" name="place">

<select   name="way" id="way" class="form-control text-center">
 <option>--- ジャンル ---</option>
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



<select name="reservatoion" id="reservatoion" class="form-control text-center">
 <option>--- 予約状況 ---</option>
      <option value="1">予約済み</option>
      <option value="0">未予約</option>
      
</select>

<label>予定開始時刻</label>
<input type="time" class="form-control text-center" name="start_time">



<label>予定終了時刻</label>
<input type="time" class="form-control text-center" name="end_time">
<br>
<label>画像</label>
<input type="file" class="form-control text-center" name="image">

<label for="switch" class="switch_label"  class="form-control text-center" onchange="ball();">
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
<!--食事の場合終了-->
