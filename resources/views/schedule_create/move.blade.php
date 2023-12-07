<!--移動の場合開始-->
<div id="move" style="display:none">
 
      

      <select name="move_way" id="move_way" for="move_way" class="form-control" onchange="MoveChange();" style="display:">
      <option>--- 何で ---</option>
        <option value="自家用車">自家用車</option>
        <option value="レンタカー">レンタカー</option>
        <option value="公共交通機関">公共交通機関</option>
      </select>
      @php View::share('uniqueId', 'car'); @endphp
  @include('schedule_move.car')
  <!--自家用車の場合終了-->

  <!--レンタカーの場合開始-->
  @php View::share('uniqueId', 'rental'); @endphp
  @include('schedule_move.rental')
  <!--レンタカーの場合終了-->

  <!--公共個通機関の場合開始-->
  @php View::share('uniqueId', 'train'); @endphp
  @include('schedule_move.train')
  <!--公共個通機関の場合終了-->

</div>
<!-- 移動の場合終了 -->
