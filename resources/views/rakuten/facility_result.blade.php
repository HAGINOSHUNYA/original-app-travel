@extends('layouts.mypage')

@section('content')
<div class="container text-center">
 <div class="row">
    <selec class="form-control">  
         <option value="施設">施設検索</option>
    </select>
   <form>
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

    <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
   </form>
 </div>

 <div class="row">
 <!--<label>市町村:</label>
        <select name="Class" class="form-control">-->
@foreach($darray[0] as $dcodes)


        @dump($dcodes)
   
 



@endforeach
<option value="#">
 
  </option>
</select>
</table>


 </div>


</div>
@endsection