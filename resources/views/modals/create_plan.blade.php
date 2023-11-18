<div class="modal fade" id="addPlanModal" tabindex="-1" aria-labelledby="addPlanModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addPlanModalLabel">プランの作成</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="{{route('mypage.store')}}" method="post">
                 @csrf
                 <div class="modal-body">
                     <input type="text" class="form-control" name="name">
                     <input type="date" class="form-control" name="start_day">
                     <input type="date" class="form-control" name="end_day">

                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">作成</button>
                 </div>
             </form>
         </div>
     </div>
 </div>