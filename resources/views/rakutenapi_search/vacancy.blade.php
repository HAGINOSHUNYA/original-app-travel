<div id="vacancy" style="display:none">
<h2>空室検索</h2>




<form action="{{route('vacncy_api')}}" method="post">

<!--都道府県のセレクトボックス開始-->
    <label for="selectedmiddleClass">都道府県:</label>
    <select name="selectedmiddleClass" id="selectedmiddleClass" class="form-control text-center">
        @foreach($middleArray as $middle)
        <option value="{{$middle[1]}}">
            {{$middle[0]}}
        </option>
        @endforeach
    </select>
<!--都道府県のセレクトボックス終了-->

<!--市町村のセレクトボックス開始-->
    <label for="selectedsmallClass">市町村:</label>
    <select name="selectedsmallClass" id="selectedsmallClass" class="form-control text-center">
        @foreach($smallArray as $small)
        <option value="{{$small[1]}}">
            {{$small[0]}}
        </option>
        @endforeach
    </select>
<!--市町村のセレクトボックス終了-->

<!--都道府県のセレクトボックス開始-->
 <label for="selectedetailClass">地区:</label>
    <select name="selecteddetailClass" id="selecteddetailClass" class="form-control text-center">
    <option selected disabled> --選択してください-- </option>
    <option value="" >選択しない</option>
        @foreach($detailArray as $detail)
        <option value="{{$detail->detailClassCode}}">
            {{$detail->detailClassName}}
        </option>
        @endforeach
  </select>
<!--都道府県のセレクトボックス終了-->

<label for="checkinDate">チェックイン</label>
<input type="date" class="form-control text-center" name="checkinDate" value="{{ \Carbon\Carbon::now()->toDateString() }}">

<label for="checkoutDate">チェックアウト</label>
<input type="date" class="form-control text-center" name="checkoutDate" value="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
    
<input type="submit" name="submit" value="検索"  class="btn btn-primary"/>


</form>
</div>