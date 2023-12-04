<div class="row">
    @if ($recently_schedules)
        @foreach ($recently_schedules as $schedule)
            <a href="#" class="link-dark text-decoration-none">
                <div class="card mb-12" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-12">
                            <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-end" alt="..."style="max-width: 100%;">
                            <div class="card text-center mb-3">
                                <div class="card-body">
                                    <h3 class="card-title">{{$schedule->event_category}}</h3>
                                    <p class="card-text">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H時i分') }}</p>
                                    <p class="card-text">{{$schedule->way}}</p>
                                    <p class="card-text">{{$schedule->start_place}}</p>
                                    <div>
                                        <p>
                                            @if($schedule->isFavoritedBy(Auth::user()))
                                                <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                                    <i class="fa-solid fa-star"></i>
                                                    お気に入り中
                                                </a>
                                            @else
                                                <a href="{{ route('favorite', $schedule) }}" class="link-dark text-decoration-none">
                                                    <i class="fa-regular fa-star"></i>
                                                    お気に入り追加する
                                                </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @else
        <p>スケジュールはありません。</p>
    @endif
</div>