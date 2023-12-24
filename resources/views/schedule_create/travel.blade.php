 
<!--観光の場合開始-->
<div class="row text-center" id="travel" style="display:none;max-width:800px">
  <form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="観光">
    <hr>
    <label>施設名</label>
    <input type="text" class="form-control" name="place">
    <hr>
    <select name="way" id="way" class="form-control text-center">
      <option>--- 選択してください ---</option>
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
    <input type="date" class="form-control text-center" name="start_day">
    <input type="time" class="form-control text-center" name="start_time">
    <hr>
    <label>到着場所</label>
    <input type="text" class="form-control text-center" name="end_place">
    <hr>
    <label>終了予定時刻</label>
    <input type="time" class="form-control text-center" name="end_time">
    <hr>
    <label>値段</label>
    <input type="text" class="form-control text-center" name="cost">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item">
    <hr>
    <label>画像</label>
    <input type="file" name="image" class="form-control text-center">
    <hr>
    <label>コメント</label>
    <input type="text" class="form-control text-center" name="comment" autofocus  placeholder="必要なもの・注意点・魅力など！">
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