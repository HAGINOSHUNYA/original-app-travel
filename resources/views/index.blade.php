@foreach ($recently_schedules as $recently_schedule)
             <div class="col-3">
                
                 <div class="row">
                     <div class="col-12">
                         <p >
                             {{ $recently_schedule->event_category }}<br>
                             <label>{{ $recently_schedule->created_at }}</label>
                         </p>
                     </div>
                 </div>
             </div>
         @endforeach