

<!--市町村のセレクトボックス開始-->
<label for="selectedsmallClass">市町村:</label>
    <select name="selectedsmallClass" id="selectedsmallClass" class="form-control">
        @foreach($smallArray as $small)
        <option value="{{$small[1]}}">
            {{$small[0]}}
        </option>
        @endforeach
    </select>
    <!--市町村のセレクトボックス終了-->







{{--
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            あてはまる市町村を選択してください
        </button>
        <ul class="dropdown-menu" style="max-height: 200px; overflow-y: auto;"> 
    @foreach($smallArray as $small)
<li>
  <div class="dropdown-item">
    <div class="form-check">  
      <input class="form-check-input" type="radio" name="selectedsmallClass" id="selectedsmallClass">
      <label class="form-check-label" for="selectedsmallClasss" value="{{$small[1]}}">
      {{$small[0]}}
      </label>
    </div>
  </div>
</li>
 @endforeach
 </ul>
    </div>

--}}

