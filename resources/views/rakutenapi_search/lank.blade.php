<div id="lank" style="display:none">

<form action="{{route('lank_api')}}">
@csrf
    
     <input type="checkbox"  name="keyword" id="onsen" value="onsen">
     <label for="onsen">温泉ランキング検索</label>

     <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  

</form>
</div>