<div id="facility" >style="display:none"


 
<form action="{{route('facility_api')}}">
    @csrf
    <!--都道府県のセレクトボックス開始-->
    <label for="selectedmiddleClass">都道府県:</label>
    <select name="selectedmiddleClass" id="selectedmiddleClass" class="form-control">
        @foreach($middleArray as $middle)
        <option value="{{$middle[1]}}">
            {{$middle[0]}}
        </option>
        @endforeach
    </select>
    <!--都道府県のセレクトボックス終了-->

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
   
    <!-- middleClass -->
    <label for="selectedmiddleClass">都道府県:</label>
    <select name="selectedmiddleClass" id="selectedmiddleClass" class="form-control">
        @foreach($Places->areaClasses as $place)
            @foreach($place[0]->largeClass[1]->middleClasses as $middleClass)
                <option value="{{ $middleClass->middleClass[0]->middleClassCode }}">
                    {{ $middleClass->middleClass[0]->middleClassName }}
                </option>
            @endforeach
        @endforeach
    </select>
    <!-- middleClass -->

    <!-- smallClass -->
    <label>市町村:</label>
    <select name="selectedSmallClass" class="form-control">
    @foreach($Places->areaClasses as $place)
        @foreach($place[0]->largeClass[1]->middleClasses as $middleClass)
            @foreach($middleClass->middleClass[1]->smallClasses as $smallClass)
                <option value="{{ $smallClass->smallClass[0]->smallClassCode }}">
                    {{ $smallClass->smallClass[0]->smallClassName }}
                </option>
            @endforeach
        @endforeach
    @endforeach
</select>
   
    <!-- smallClass -->
    --}}
    <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
    
  </form>


<div class="row">
<table >
    <tr>
                            <th>タイトル</th>
                            <th>いいね数</th>
                            <th>コメント数</th>
                            <th>作成日</th>
    </tr>
                        <br>

@foreach($posts->hotels as $post)
                        <tr>
                            <td>{{$post->hotel[0]->hotelBasicInfo->hotelNo}}</td>
                            <td>{{$post->hotel[0]->hotelBasicInfo->hotelName}}</td>
                            <td>{{$post->hotel[0]->hotelBasicInfo->address1}}</td>
                            <td>{{$post->hotel[0]->hotelBasicInfo->address2}}</td>
                            <br>
                        </tr>
                        @endforeach
</table>
</div>
{{--
    @foreach($Places->areaClasses as $place)
     @foreach($place[0]->largeClass[1]->middleClasses as $middleClass)
     
     
      @foreach($middleClass->middleClass[1]->smallClasses as $smallClass)
       @dump($smallClass->smallClass[0]->smallClassCode)
       @dump($smallClass->smallClass[0]->smallClassName)
      @endforeach
      
     @endforeach
    @endforeach--}}
</div>