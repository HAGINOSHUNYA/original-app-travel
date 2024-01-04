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
$('#selectedmiddleClass').on('change', function() {
    var selectedValue = $(this).val();

    // マッピングオブジェクトを利用して数値に変換
    var convertedValue = prefectureMapping[selectedValue] || 0;

    // ここで convertedValue の値を利用して何かしらの処理を行う
    console.log('選択された値:', convertedValue);

    // smallclassのAjaxリクエスト
    $.ajax({
        type: 'POST',
        url:  '{{ url("/api/getSmallClass") }}',
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

            var smallClassSelect = $('#selectedsmallClass');
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


          var detailClassSelect = $('#selecteddetailClass');
            detailClassSelect.empty();

            for (var i = 0; i < data.length; i++) {
                console.log('Loop iteration:', i);
                detailClassSelect.append($('<option>', {
                    value: data[i].detailClassCode,
                    text: data[i].detailClassName
                }));
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

    









