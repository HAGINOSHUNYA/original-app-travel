<!--食事の場合開始-->
<div class="row text-center" id="eat" style="display:none;max-width:800px">
  <form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="食事"/>
    <hr>
    <label>タイトル</label>
    <input type="text" class="form-control text-center" id="title" name="title">
    <hr>
    <label>店名</label>
    <input type="text" class="form-control text-center" id="place" name="place">
    <hr>
    <select   name="way" id="way" class="form-control text-center">
    <option>--- 選択してください ---</option>
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
    <hr>
    <select name="reservatoion" id="reservatoion" class="form-control text-center">
      <option>--- 予約状況 ---</option>
      <option value="true">予約済み</option>
      <option value="false">未予約</option>
    </select>
    <hr>
    @dump($plan->start_day)
    @dump($day)
    <label>予定開始時刻</label>
    <input type="date" class="form-control text-center" name="start_day">
    <input type="time" class="form-control text-center" name="start_time">
    <hr>
    <label>予定終了時刻</label>
    <input type="time" class="form-control text-center" name="end_time">
    <hr>
    <label>値段</label>
    <input type="text" class="form-control" name="cost">
    <hr>
    <label>必要なもの</label>
    <input type="text" class="form-control text-center" name="item">
    <hr>
    <label>画像</label>
    <input type="file" class="form-control text-center" name="image">
    <hr>
    <label>コメント</label>
    <input type="text" class="form-control" name="comment">
    <hr>
    <label for="switch" class="switch_label"  class="form-control text-center" onchange="ball();">
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
<!--食事の場合終了-->
