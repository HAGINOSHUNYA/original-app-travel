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
    
    <label>予定開始時刻</label>
    <input type="date" class="form-control text-center" name="start_day" value="{{$day}}" required>
    <input type="time" class="form-control text-center" name="start_time" required>
    <hr>
    <label>予定終了時刻</label>
    <input type="time" class="form-control text-center" name="end_time" required>
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
    
    <input type="submit" name="submit" value="登録"  class="btn btn-primary"/>
  </form>
</div>
<!--食事の場合終了-->
