<div id="facility" style="display:none">
<h2>楽天施設検索</h2>

 
 
<form action="{{route('facility_api')}}">
    @csrf
    
   
            @include('facility.middleClasses')
       
 
            @include('facility.smallClasses')

            @include('facility.detailClasses')
      
   
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

</div>