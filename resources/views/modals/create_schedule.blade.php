<div class="d-flex justify-content-center">
<div class="modal fade" id="addscheduleModal" tabindex="-1" aria-labelledby="addscheduleModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addscheduleModalLabel">プランの作成</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="#" method="post">
                 @csrf
                 <div class="modal-body">
                     <p>何を</p>
                     <P>どこで</p>
                     <p>いつから</p>
                     <p>いつまで</p>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">作成</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>