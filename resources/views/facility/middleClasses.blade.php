<script>
    $(document).ready(function() {
        // id="selectedmiddleClass"が変更されたときの処理
        $('#selectedmiddleClass').on('change', function() {
            var selectedValue = $(this).val();

            // Ajaxリクエストを送信
            $.ajax({
                type: 'POST',
                url: '/getSelectedSmallClass',
                data: { selectedValue: selectedValue },
                dataType: 'json',
                success: function(data) {
                    // id="selectedsmallClass"のオプションを変更
                    var smallClassSelect = $('#selectedsmallClass');
                    smallClassSelect.empty(); // オプションを一旦クリア

                    // 取得したデータを元にオプションを追加
                    for (var i = 0; i < data.length; i++) {
                        smallClassSelect.append($('<option>', {
                            value: data[i], // 適切なプロパティに修正
                            text: data[i] // 適切なプロパティに修正
                        }));
                    }
                },
                error: function(error) {
                    console.log(error);
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

    @dump($middleArray);








{{--
  <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             あてはまる都道府県を選択してください
        </button>
        <ul class="dropdown-menu" style="max-height: 200px; overflow-y: auto;"> 
@foreach($middleArray as $middle)
<li>
  <div class="dropdown-item">
    <div class="form-check">  
      <input class="form-check-input" type="radio" name="selectedmiddleClass" id="selectedmiddleClass">
      <label class="form-check-label" for="selectedmiddleClass" value="{{$middle[1]}}">
        {{$middle[0]}}
      </label>
    </div>
  </div>
</li>
 @endforeach
 </ul>
    </div>
--}}


