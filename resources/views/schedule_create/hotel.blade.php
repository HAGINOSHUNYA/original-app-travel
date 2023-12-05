<!--宿泊の場合開始-->
<div id="hotel" style="display:none">
<form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="event_category" value="宿泊">
<a href="{{route('rakuten.index')}}">ホテル検索</a>


<input type="daytime" class="form-control" name="start_time">チェックイン
<input type="daytime" class="form-control" name="end_time">チェックアウト
<input type="text" class="form-control" name="place">ホテル名
<input type="text" class="form-control" name="text">費用
<br>
<label>画像</label>
<input type="file" name="image">

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
<!--宿泊の場合終了-->