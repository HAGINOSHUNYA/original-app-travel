<div class="modal fade" id="editplanModal{{$plan->id}}" tabindex="-1"   aria-hidden="true" aria-labelledby="editGoalModalLabel{{ $plan->id }}">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editplanModalLabel{{ $plan->id }}">プランの編集</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
             <form action="#" method="post">
                 @csrf
                 @method('patch')                                                                    
                 <div class="modal-body">
                     <input type="text" class="form-control" name="name" value="{{ $plan->name }}">
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">更新</button>
                 </div>   
             </form>             
         </div>
     </div>
 </div>