@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
         <h1>お気に入り</h1>
        </div>
        <hr>
        <div class="row">

            @foreach ($favorites as $fav)
            @if ($fav->favoriteable_type === 'App\Models\Schedule' && $fav->favoriteable->user->id === auth()->id())
                

            
                <div class="card mb-3" style="max-width: 1800px;">
                
                    <div class="row g-0">
                        <div class="col-md-2">
                            @if(App\Models\Schedule::find($fav->favoriteable_id)->image_name)
                                <img src="{{ asset('storage/img/' . App\Models\Schedule::find($fav->favoriteable_id)->image_name) }}" class="img-fluid rounded-start" alt="...">
                            @else
                                <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                            @endif
                        </div>
                        
                        <div class="col-md-10">
                            <a href="{{ route('schedule_show', ['schedule' => $fav->favoriteable_id, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                                <div class="card-body">
                                
                                    <h5 class="card-title">{{App\Models\Schedule::find($fav->favoriteable_id)->event_category}}</h5>
                                    <p class="card-text">カテゴリ:{{App\Models\Schedule::find($fav->favoriteable_id)->event_category}}</p>
                                    <p class="card-text"><small class="text-body-secondary">作成者：{{ App\Models\Schedule::find($fav->favoriteable_id)->user->name }}　さん</small></p>
                                    <a href="#">

                                    </a>
                                    <button type="button" class="btn btn-outline-danger" style="margin-top: 50px;"> 
                                    @if($fav->favoriteable->isFavoritedBy(Auth::user()))
                                        <a href="{{ route('favorite', $fav->favoriteable) }}" class="link-dark text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
                                            <i class="fa-solid fa-star"></i>
                                            お気に入り解除する</small>
                                        </a>
                                    @else
                                        <a href="{{ route('favorite', $fav->favoriteable) }}" class="link-dark text-decoration-none">
                                            <i class="fa-regular fa-star"></i>
                                            お気に入り追加する</small>
                                        </a>
                                    @endif
                                    </button>
                                    @dump($fav->favoriteable)
                                </div>
                            </a>
                        </div>
                    </div>
                
                </div>
            
             

            @else
            <div class="card mb-3" style="max-width: 1800px;">
                
                <div class="row g-0">
                    <div class="col-md-2">
                        @if(App\Models\Schedule::find($fav->favoriteable_id)->image_name)
                            <img src="{{ asset('storage/img/' . App\Models\Schedule::find($fav->favoriteable_id)->image_name) }}" class="img-fluid rounded-start" alt="...">
                        @else
                            <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image">
                        @endif
                    </div>
                    <div class="col-md-10">
                        <a href="{{ route('public_schedule', ['schedule' => $fav->favoriteable_id, 'plan' => $plan->id]) }}" class="link-dark text-decoration-none">
                        <div class="card-body">
                            
                            <h5 class="card-title">{{App\Models\Schedule::find($fav->favoriteable_id)->event_category}}</h5>
                            <p class="card-text">カテゴリ;{{App\Models\Schedule::find($fav->favoriteable_id)->event_category}}</p>
                            <p class="card-text"><small class="text-body-secondary">作成者：{{ App\Models\Schedule::find($fav->favoriteable_id)->user->name }}　さん</small></p>
                            <button type="button" class="btn btn-outline-danger text-end" style="margin-top: 50px;"> 
                                    @if($fav->favoriteable->isFavoritedBy(Auth::user()))
                                        <a href="{{ route('favorite', $fav->favoriteable) }}" class="link-dark text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
                                            <i class="fa-solid fa-star"></i>
                                            お気に入り解除する</small>
                                        </a>
                                    @else
                                        <a href="{{ route('favorite', $fav->favoriteable) }}" class="link-dark text-decoration-none">
                                            <i class="fa-regular fa-star"></i>
                                            お気に入り追加する</small>
                                        </a>
                                    @endif
                                    </button>
                                    @dump($fav->favoriteable)
                        </div>
                        </a>
                    </div>
                </div>
            
            </div>
        
        @endif
    @endforeach


 {{ $favorites->links() }}
 @endsection