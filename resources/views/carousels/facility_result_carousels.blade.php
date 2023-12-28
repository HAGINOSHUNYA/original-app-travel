<div id="carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
            @if($post->hotel[0]->hotelBasicInfo->hotelImageUrl)
              <img src="{{$post->hotel[0]->hotelBasicInfo->hotelImageUrl}}" class="d-block w-100" alt="..."style="height: 350px;">
            @else
              <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 350px;">
            @endif
      <div class="carousel-caption d-none d-md-block">
        <p style="color: black;">>{{$post->hotel[0]->hotelBasicInfo->hotelSpecial}}</p>
       
      </div>
    </div>
    <div class="carousel-item">
            @if($post->hotel[0]->hotelBasicInfo->roomImageUrl)
              <img src="{{$post->hotel[0]->hotelBasicInfo->roomImageUrl}}" class="d-block w-100" alt="..." style="height: 350px;">
            @else
              <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 350px;">
            @endif
      
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item">
            @if($post->hotel[0]->hotelBasicInfo->hotelMapImageUrl)
              <img src="{{$post->hotel[0]->hotelBasicInfo->hotelMapImageUrl}}" class="d-block w-100" alt="..."style="height: 350px;" >
            @else
              <img src="{{ asset('img/no_img.jpg') }}" class="img-fluid rounded-start" alt="Default Image" style="height: 350px;">
            @endif
      
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions{{$post->hotel[0]->hotelBasicInfo->hotelNo}}" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

