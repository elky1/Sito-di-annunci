<x-layout>
    <div class="container containerDetails">
        <div class="row justify-content-center my-5">


              <div class="row">



                    <div class="thumbnails col-2 mx-0">
                      @foreach ($adv->images as $image)
                      <div class="carouselImgSmallContainer">
                        <a class="carouselImgSmallLink" href="#slide{{$image->id}}"><img class="carouselImgSmall" src="{{$image->getUrl(390,230)}}" /></a>
                      </div>
                      @endforeach
                    </div>

                    <div class="slides col-6 mx-0">
                      @foreach ($adv->images as $image)
                       <div class="carouselSlideLink" id="slide{{$image->id}}"><img class="carouselSlide" src="{{$image->getUrl(267,400)}}" alt="" /></div>
                      @endforeach
                    </div>


                  <div class="col-12 col-md-2 col-lg-4 mx-md-5">
                    <div class="card-body">
                      <h2 class="card-title">{{$adv->title}}</h2>
                      <h3 class="card-text">{{__('ui.show_price')}}: {{$adv->price}}$</h3>
                      <h6 class="card-text">{{__('ui.show_description')}}: {{$adv->description}}</h5>
                      <h5 class="card-text">{{__('ui.card_category')}}: <a href="{{route('public.advs.category', ['category'=>$adv->category_id])}}" class="text-decoration-none">{{$adv->category->category_name}}</a></h5>
                      <a href="{{route('homepage')}}" class="btn btn-dark">{{__('ui.show_backToHomeButton')}}</a>
                    </div>
                </div>

                 </div>




  </div>
</div>
</x-layout>


