<div class="row text-center" id="rental" style="display:none;max-width:800px">
<form action="{{route('schedule_store',$plan)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="event_category" value="移動">
    <input type="hidden" name="way" value="レンタカー">
    <input type="hidden" name="move_way" value="レンタカー">
    <label>タイトル</label>
    <input type="text" class="form-control text-center" id="title" name="title">
    <hr>
      <label>出発時刻</label>
      <input type="date" class="form-control text-center" name="start_day" value="{{$day}}">
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

     

      <input type="submit" name="submit" value="登録"  class="btn btn-primary"/>
  </form>
</div>