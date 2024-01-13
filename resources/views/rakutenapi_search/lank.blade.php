<div id="lank" style="display:none">
<h2>ランキング検索</h2>

<form action="{{route('lank_api')}}">
@csrf
    
     <select name="keyword" id="onsen" class="form-control text-center">
     <option for="onsen" value="all" class="text-center">総合検索</option>
     <option for="onsen" value="onsen" class="text-center">温泉ランキング検索</option>
     <option for="onsen" value="premium" class="text-center">高級ホテル/旅館ランキング検索</option>

     <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
  

</form>
</div>