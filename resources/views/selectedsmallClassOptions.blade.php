@extends('layouts.mypage')

@section('content')
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
<!--次のセレクトボックス開始-->
<label for="selectedsmallClass">市町村:</label>
<select name="selectedsmallClass" id="selectedsmallClass" class="form-control">
    <!-- ここにサーバーサイドから取得したオプションを表示 -->
    @foreach($testarray as $item)
        @if(isset($item->smallClassName))
            <option value="{{ htmlspecialchars($item->smallClassName) }}">{{ htmlspecialchars($item->smallClassName) }}</option>
        @endif
    @endforeach
</select>
<!--次のセレクトボックス終了-->


<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <button id="refresh-btn">更新</button>
    <div id="outputDiv">SAMURAI</div>

    <script>
        const refreshBtn = document.getElementById('refresh-btn');
        const outputDiv = document.getElementById('outputDiv');
        let intervalId; // 定期実行のチェック用変数

        // 非同期通信でサーバー側からデータを取得する関数
        function fetchFromServer() {
            // 送信するデータ
            const dispData = {
                name: outputDiv.textContent
            };

            // サーバー側にAjaxリクエストを送信
            fetch('ajax_server.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dispData) // JSON形式に変換
            })
            // サーバー側からAjaxレスポンスを受け取ったときの処理
            .then((response) => response.json()) // JSON形式に変換
            .then((data) => {
                // 受け取ったデータを表示
                outputDiv.textContent = data.message;
            })
        }

        // 更新ボタンがクリックされたときのイベント
        refreshBtn.addEventListener('click', () => {
            // 定期実行中（IDが0でない）なら停止
            if (intervalId) {
                // 定期実行を停止
                clearInterval(intervalId);
                intervalId = 0;
                refreshBtn.textContent = '更新'; // ボタン表示切り替え
            } else {
                // 1秒ごとの定期実行を開始し、そのIDを記録
                intervalId = setInterval(fetchFromServer, 1000);
                refreshBtn.textContent = '停止'; // ボタン表示切り替え
            }
        });
    </script>
</body>

</html>

@endsection