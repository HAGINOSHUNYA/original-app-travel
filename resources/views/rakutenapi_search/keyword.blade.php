<div id="keyword" style="display:none">

  <form action="{{route('keyword')}}" class="from-control">
    @csrf
     <label>キーワード検索</label>
     <input type="text" name="keyword" >
     <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  </form>

  


</div>
