@foreach ($recently_schedules as $schedule)

     <div class="card mb-3" style="max-width:1800px;">
        <div class="row g-0" >
            <div class="col-md-4">
                @if($schedule->image_name)
                    <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="..." style="height: 200px;width:300px; ">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 200px;width:300px; ">
                @endif
            </div>
            <div class="col-md-8" style="padding: 0px;">
            <a href="{{route('public_schedule',['schedule'=>$schedule])}}" class="link-dark text-decoration-none">
                <div class="card-body">
                    <h1 class="card-title" style="margin-bottom: 0px;">{{ $schedule->title }}</h1>
                    <h3 class="card-text" style="margin-bottom: 0px;">開始予定時刻：{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</h2>
                    <p class="card-text"><small class="text-body-secondary">作成者：{{ App\Models\Schedule::find($schedule->id)->user->name }}　さん</small></p>
                    
                      
                        <button type="button" class="btn btn-outline-dark btn-lg" style="margin-top: 0px;"> 
                            @if($schedule->isFavoritedBy(Auth::user()))
                            <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                   <i class="fa-solid fa-star"></i>
                                   お気に入り中</small>
                             </a>
                            @else
                            <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                  <i class="fa-regular fa-star"></i>
                                  お気に入り追加する</small>
                            </a>
                            @endif
                        </button>
                      
                        
                    

             </a>
        </div>
    </div>
  </div>
</div>
  
@endforeach














{{--<div class="row">
@foreach ($recommend_schedules as $schedule)
<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-4">
                @if($schedule->image_name)
                    <img src="{{ asset('storage/img/' . $schedule->image_name) }}" class="img-fluid rounded-start" alt="...">
                @else
                    <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                @endif
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            @if($schedule->isFavoritedBy(Auth::user()))
                <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                    <i class="fa-solid fa-star"></i>
                        お気に入り中</small>
                </a>
            @else
                <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                    <i class="fa-regular fa-star"></i>
                        お気に入り追加する</small>
                </a>
            @endif
      </div>
    </div>
  </div>
</div>
@endforeach
--}}
