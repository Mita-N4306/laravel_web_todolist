  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="4000" >
        <img src="{{asset('img/top-1.png')}}" class="d-block w-99 mx-auto custom-img" alt="トップ画像1">
      </div>
      <div class="carousel-item" data-bs-interval="4000" >
        <img src="{{asset('img/top-2.png')}}" class="d-block w-99 mx-auto custom-img" alt="トップ画像2">
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img src="{{asset('img/top-3.png')}}" class="d-block w-99 mx-auto custom-img" alt="トップ画像3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
