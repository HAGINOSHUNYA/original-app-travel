<div class="modal fade" id="kyewordModal{{ $hotel->hotelNo }}" tabindex="-1" aria-labelledby="kyewordModal{{ $hotel->hotelNo }}">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">

             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="kyewordModalLabel{{ $hotel->hotelNo }}">{{$hotel->hotelName}}</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>             
             </div>

             <div class="modal-body">

              <div class="container-fluid">
                <div class="row">
                  @include('carousels.kyeword_carousel') 
                </div>

                <div class="row">
                    <p> <br>{{$hotel->hotelSpecial}}</p>
                  </div>
                </div>

                <div class="row">
                  アクセス
                </div>

              </div>




             </div>
             
         </div>
     </div>
 </div>