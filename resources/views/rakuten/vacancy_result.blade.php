@extends('layouts.mypage')

@section('content')
<div class="container text-center" id="top">
      <span>
       <p> <a href="{{route('rakuten.index')}}">検索</a> > 空室検索 > 検索結果</p>
      </span> 
</div>
<script>//smallclassを生成
$(document).ready(function() {
    // オブジェクトマッピングを定義
    var prefectureMapping = {
      'hokkaidou': 0,
        'aomori': 1,
        'iwate': 2,
        'miyagi': 3,
        'akita': 4,
        'yamagata': 5,
        'hukushima': 6,
        'ibaragi': 7,
        'tochigi': 8,
        'gunma': 9,
        'saitama': 10,
        'tiba': 11,
        'tokyo': 12,
        'kanagawa': 13,
        'niigata': 14,
        'toyama': 15,
        'ishikawa': 16,
        'hukui': 17,
        'yamanasi': 18,
        'nagano': 19,
        'gihu': 20,
        'shizuoka': 21,
        'aichi': 22,
        'mie': 23,
        'shiga': 24,
        'kyoto': 25,
        'osaka': 26,
        'hyogo': 27,
        'nara': 28,
        'wakayama': 29,
        'tottori': 30,
        'simane': 31,
        'okayama': 32,
        'hiroshima': 33,
        'yamaguchi': 34,
        'tokushima': 35,
        'kagawa': 36,
        'ehime': 37,
        'kouchi': 38,
        'hukuoka': 39,
        'saga': 40,
        'nagasaki': 41,
        'kumamoto': 42,
        'ooita': 43,
        'miyazaki': 44,
        'kagoshima': 45,
        'okinawa': 46
    };
    var parsedData; // parsedDataをグローバル変数として定義

    // id="selectedmiddleClass"が変更されたときの処理
    $('#selectedmiddleClass1').on('change', function() {
    var selectedValue = $(this).val();

    // マッピングオブジェクトを利用して数値に変換
    var convertedValue = prefectureMapping[selectedValue] || 0;

    // ここで convertedValue の値を利用して何かしらの処理を行う
    console.log('選択された値:', convertedValue);

    // smallclassのAjaxリクエスト
    $.ajax({
        type: 'POST',
        url: '{{ url("/api/getSmallClass") }}',
        data: {
            selectedValue: convertedValue,
            _token: 'Z698vwJrmgFHDZAPS2FherWNOAV1Ag2YbGbv2J4B',
            _method: "POST"
        },
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(parsedData) {
            console.log('データ:', parsedData);
            console.log('選択された値:', convertedValue);

            var smallClassSelect = $('#selectedsmallClass1');
            smallClassSelect.empty();

            for (var i = 0; i < parsedData.length; i++) {
                console.log('Loop iteration:', i);
                smallClassSelect.append($('<option>', {
                    value: parsedData[i].smallClassCode,
                    text: parsedData[i].smallClassName
                }));
            }

            console.log('Newly added options:', smallClassSelect.val());

            console.log('parsedData:', parsedData);
        },
        error: function(error, XMLHttpRequest, textStatus, errorThrown) {
            console.log("smallclassのajax通信に失敗しました");
            console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            console.log("textStatus     : " + textStatus);
            console.log("errorThrown    : ", error);
        }
    });

    // detailclassのAjaxリクエスト
    $.ajax({
        type: 'POST',
        url: '{{ url("/api/getDetailClass") }}',
        data: {
            selectedValue: convertedValue,
            _token: 'Z698vwJrmgFHDZAPS2FherWNOAV1Ag2YbGbv2J4B',
            _method: "POST"
        },
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log("detailclassのajax通信に成功しました:", data);
            console.log('選択された値:', convertedValue);

            var detailClassSelect = $('#selecteddetailClass1');
            detailClassSelect.empty();

            // $responseArray が存在しない場合のデフォルトのオプションを作成
            if (data.length === 0) {
                detailClassSelect.append($('<option>', {
                    value: null,
                    text: 'なし'
                }));
            } else {
                for (var i = 0; i < data.length; i++) {
                    console.log('Loop iteration:', i);
                    detailClassSelect.append($('<option>', {
                        value: data[i].detailClassCode,
                        text: data[i].detailClassName
                    }));
                }
            }
        },
        error: function(error, XMLHttpRequest, textStatus, errorThrown) {
            console.log("detailclassのajax通信に失敗しました");
            console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            console.log("textStatus     : " + textStatus);
            console.log("errorThrown    : ", error.responseText);
        }
    });
});
});
</script>
<div class="container text-center">

  <form action="{{route('vacancy_api')}}" method="post">
    @csrf

    <!--都道府県のセレクトボックス開始-->
    <label for="selectedmiddleClass1">都道府県:</label>
    <select name="selectedmiddleClass" id="selectedmiddleClass1" class="form-control text-center">
        @foreach($middleArray as $middle)
        <option value="{{$middle[1]}}">
            {{$middle[0]}}
        </option>
        @endforeach
    </select>
    <!--都道府県のセレクトボックス終了-->

    <!--市町村のセレクトボックス開始-->
    <label for="selectedsmallClass1">市町村:</label>
    <select name="selectedsmallClass" id="selectedsmallClass1" class="form-control text-center">
    <option selected disabled value=""> --選択して下さい-- </option>
        
    </select>
    <!--市町村のセレクトボックス終了-->

    <!--都道府県のセレクトボックス開始-->
    <label for="selectedetailClass1">地区:</label>
    <select name="selecteddetailClass" id="selecteddetailClass1" class="form-control text-center">
    <option selected disabled value=""> --選択しない-- </option>
    
    </select>
    <!--都道府県のセレクトボックス終了-->

    <label for="checkinDate">チェックイン</label>
    <input type="date" class="form-control text-center" name="checkinDate" value="{{ \Carbon\Carbon::now()->toDateString() }}">
    <label for="checkoutDate">チェックアウト</label>
    <input type="date" class="form-control text-center" name="checkoutDate" value="{{ \Carbon\Carbon::tomorrow()->toDateString() }}">
    <input type="submit" name="submit" value="検索"  class="btn btn-primary"/>
  </form>
</div>
<hr>
          
<div class="container text-center">
  <h1>空室検索結果</h1>
  <hr>

  @if($posts != "")
              @foreach($posts->hotels as $post)
              <div class="card mb-3" style="max-width: 1800px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    @include('carousels.facility_result_carousels')
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                    <p class="card-text"><small class="text-body-secondary">{{$post->hotel[0]->hotelBasicInfo->hotelKanaName}}</small></p>
                      <h3 class="card-title">{{$post->hotel[0]->hotelBasicInfo->hotelName}}</h3>
                      <p class="card-text">TEL:{{$post->hotel[0]->hotelBasicInfo->telephoneNo}}</p>
                      <p class="card-text">住所:〒{{$post->hotel[0]->hotelBasicInfo->postalCode}}　{{$post->hotel[0]->hotelBasicInfo->address1}}{{$post->hotel[0]->hotelBasicInfo->address2}}</p>
                      <p class="card-text">最寄駅:{{$post->hotel[0]->hotelBasicInfo->nearestStation}}駅</p>
                      <p class="card-text">アクセス:{{$post->hotel[0]->hotelBasicInfo->access}}</p>
                      
                      
                      
                      
                      
                      <p class="card-text">{{$post->hotel[0]->hotelBasicInfo->hotelSpecial}}</p>
                      <p class="card-text"><small class="text-body-secondary">リンクURL：<a href="{{ $post->hotel[0]->hotelBasicInfo->hotelInformationUrl }}" target="_blank">ホテルHP</a></small></p>
                    </div>
                  </div>
                </div>
              </div>

              
              @endforeach

              <div class="back-to-top">
                <a href="#top">ページ上部へ</a>
              </div>
  @else
    <!--エラー時の表示-->
    <h1>{{$message}}</h1>
  @endif


</div>

@endsection