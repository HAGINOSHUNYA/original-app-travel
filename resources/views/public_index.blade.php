@extends('layouts.app')

@section('content')
<div class="container text-center" style="max-width: 1800px">
<div class="public_div">
<img src="{{ asset('img/public_top.png') }}" class="public_img">
<h1>旅行計画アプリ</h1>
</div>

<h1>使い方</h1>
<hr>
<p class = "public_p">（１）はじめにをプラン作成します</p>
<div class="public_img">
<img src="{{ asset('img/public_plan1.png') }}" class="public_img">

</div>
<hr>
<p class = "public_p">（２）旅行の名前と期間を入力します</p>
<div class="public_div">
<img src="{{ asset('img/public_plan2.png') }}" class="public_img">

</div>
<hr>
<p class = "public_p">（３）入力後プランができました。</p><br>
<p class = "public_p">プランの中にスケジュールを追加していきます。</p>
<div class="public_div">
<img src="{{ asset('img/public_plan3.png') }}" class="public_img">

</div>

<hr>
<p class = "public_p">（４）あてはまるものを選択します。</p>
<div class="public_div">
<img src="{{ asset('img/public_schedule1.png') }}" class="public_img">

</div>
<hr>
<p class = "public_p">（５）必要事項を入力してください。</p>
<div class="public_div">
<img src="{{ asset('img/public_schedule2.png') }}" class="public_img">

</div>
<hr>
<p class = "public_p">（6）スケジュール一覧で作成したスケジュールを確認します</p>
<p class = "public_p">クリックして詳細を確認できます。</p>
<div class="public_div">
<img src="{{ asset('img/public_schedule3.png') }}" class="public_img">

</div>
<hr>
<p class = "public_p">（５）必要事項を入力してください。</p>
<div class="public_div">
<img src="{{ asset('img/public_schedule4.png') }}" class="public_img">

</div>
</div>
@endsection