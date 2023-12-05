<!--移動の場合開始-->
<div id="move" style="display:none">
<form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="event_category" value="移動">
      

<select name="way" id="way" class="form-control">
 <option>--- 何で ---</option>
      <option value="自家用車">自家用車</option>
      <option value="レンタカー">レンタカー</option>
</select>
<label>出発時刻</label>
<input type="time" class="form-control" name="start_time">
<label>出発場所</label>
<input type="text" class="form-control" name="start_place">
<label>到着時刻</label>
<input type="time" class="form-control" name="end_time">
<label>到着場所</label>
<input type="text" class="form-control" name="end_place">
<br>
<label>画像</label>
<input type="file" name="image" class="form-control">

<br>
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

<!--移動の場合終了-->