<!--宿泊の場合開始-->
<div class="row text-center" id="hotel" style="display:none;max-width:800px">
  <form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="宿泊">
    <a href="{{route('rakuten.index')}}">ホテル検索</a><br>
    <hr style="margin: 0px;padding: 0px;">
    <label>タイトル</label>
    <input type="text" class="form-control" name="title">
    <hr>    
    <label>ホテル名</label>
    <input type="text" class="form-control" name="place">
    <hr>
    <label>ホテル住所</label>
    <input type="textarea" class="form-control" name="address">
    <hr>
    
    <label>チェックイン</label>
    <input type="date" class="form-control text-center" name="start_day">
    <input type="time" class="form-control" name="start_time">
    <hr>
    <label>チェックアウト</label>
    <input type="time" class="form-control" name="end_time">
    <hr>    
    <label>値段</label>
    <input type="text" class="form-control" name="cost">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item">
    <hr>
    <label>画像</label>
    <input type="file" name="image">
    <hr>
    <label>コメント</label>
    <input type="text" class="form-control" name="comment">
    <hr>
    <label for="switch" class="switch_label"  onchange="ball();">
      <div class="switch">
        <input type="checkbox" id="switch" name="recommend_flag" {{ old('recommend_flag', false) ? 'checked' : '' }}/>
        <div class="circle"></div>
        <div class="base"></div>
      </div>
      <span class="title">おすすめ非公開</span>
    </label>
    <hr>
    <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  </form>
</div>
<!--宿泊の場合終了-->