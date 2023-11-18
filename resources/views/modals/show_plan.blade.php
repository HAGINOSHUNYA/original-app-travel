<div class="modal fade" id="showPlanModal" tabindex="-1" aria-labelledby="showPlanModalLabel">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="showPlanModalLabel">プラン一覧</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
             </div>
            
             <div>                        
             @foreach ($plans as $plan) 
             
                 <!-- 目標の編集用モーダル -->
                 @include('modals.edit_plan') 
 
                 <!-- 目標の削除用モーダル -->
                 @include('modals.delete_plan')  
 
                 <div class="col">     
                     <div class="card bg-light">
                         <div class="card-body d-flex justify-content-between align-items-center">
                             <h4 class="card-title ms-1 mb-0">{{ $plan->name }}</h4>
                             <div class="modal-body">
                              <h4 class="card-title ms-1 mb-0">予定開始日：{{ ($plan->start_day)}}->format("Y-m-d")</h4>
                                <br>
                              <h4 class="card-title ms-1 mb-0">予定終了日：{{ $plan->end_day }}</h4>
                              <h4 class="card-title ms-1 mb-0">{{ $plan->comment }}</h4>
                            </div>
                             <div class="d-flex align-items-center">                                 
                                 <div class="dropdown">
                                     <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none" id="dropdownplanMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">︙</a>
                                     <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownplanMenuLink">
                                         <li><a href="{{route('schedule',$plan)}}" class="dropdown-item" >詳細</a></li>                                   
                                         <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editplanModal{{ $plan->id }}">編集</a></li>                                   
                                         <div class="dropdown-divider"></div>
                                         <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteplanModal{{ $plan->id }}">削除</a></li>                                                                                                          
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>                           
                 </div>
             @endforeach                       
         </div>                  
         </div>
     </div>
 </div>
