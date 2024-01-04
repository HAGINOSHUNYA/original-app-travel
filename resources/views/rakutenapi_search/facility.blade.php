<div id="facility" style="display:none">
<h2>楽天施設検索</h2>

 
 
<form action="{{route('facility_api')}}">
    @csrf
    
   
            @include('facility.middleClasses')
       
 
            @include('facility.smallClasses')

            @include('facility.detailClasses')
      
   
    <input type="submit" name="submit" value="送信"  class="btn btn-primary"/>
    
  </form>

