@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-2">
     </div>
     <div class="col-9">
         <h1>おすすめ商品</h1>
         <div class="row">
         foreach ($recommend_products as $recommend_product)
         <div class="col-4">
          <a>
            画像がない場合はダミーを表示
            if
            else
            endif
          </a>
          <div class="row">
                     <div class="col-12">
                     </div>
                 </div>
             </div>
             endforeach
             </div>
 
 <div class="col-4">
     <a href="#">
     </a>
                 <div class="row">
                     <div class="col-12">
                     </div>
                 </div>
             </div>
 
         </div>
 
         <h1>新着商品</h1>
         <!--変数で取得した$recently_productsをループで繰り返し処理して表示しています。-->
         <div class="row">
          foreach
         <div class="col-3">
         <div class="row">
                     <div class="col-12">
                     </div>
                 </div>
             </div>
             </div>
     </div>
 </div>
         endforeach





@endsection


