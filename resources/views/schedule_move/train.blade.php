<div id="train" style="display:none">
<form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="移動">
    <input type="hidden" name="move_way" value="公共交通機関">

    <label>路線名</label>
    <input type="text" class="form-control" name="train_nname_1">

    <div style="display: flex;display: flex; justify-content: center; align-items: center; ">乗り換え
      <div>
        <label>あり
        <input type="radio" name="reservation" class="form-control" value="1">
        </label>
      </div>
      <div>
        <label>なし
        <input type="radio" name="reservation" class="form-control" value="0">
        </label>
      </div>
    </div>



      <label>出発時刻</label>
      <input type="time" class="form-control" name="start_time">

      <label>出発場所</label>
      <input type="text" class="form-control" name="start_place">

      <label>到着時刻</label>
      <input type="time" class="form-control" name="end_time">

      <label>到着場所</label>
      <input type="text" class="form-control" name="end_place">

      <label>画像</label>
      <input type="file" name="image" class="form-control">

      <label>コメント</label>
      <input type="text" class="form-control" name="comment">

      <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  </form>
</div>