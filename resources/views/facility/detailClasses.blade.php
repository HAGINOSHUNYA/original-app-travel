{{-- <!--都道府県のセレクトボックス開始-->
 <label for="selectedetailClass">地区:</label>
    <select name="selectedmiddleClass" id="selectedmiddleClass" class="form-control">
    <option selected disabled> --選択してください-- </option>
    <option value="" >選択しない</option>
        @foreach($detailArray as $detail)
        <option value="{{$detail->detailClassCode}}">
            {{$detail->detailClassName}}
        </option>
        @endforeach
    </select>
    <!--都道府県のセレクトボックス終了-->
    --}}