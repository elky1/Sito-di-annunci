<x-layout>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1>{{__('ui.search_results')}}: {{$q}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
      <div class="row align-items-center justify-content-center cardContainerWelcome">

        @foreach ($advs as $adv)

        <div class="cardAdv mx-2 my-4">
          <a href="{{route('adv.show', compact('adv'))}}" class="text-decoration-none">
            <div class="imgCardContainer">

              @foreach ($adv->images as $image)
                @if($loop->first)
                <img src="{{$image->getUrl(390,230)}}" class="imgCard" alt="...">
                @endif
              @endforeach

            </div>
            <div class="cardAdvContent">
              <div >
                <h3 class="cardAdvProductName">{{$adv->title}}</h3>
              </div>
              <div class="cardAdvPriceContainer">
                <h2 class="cardAdvPrice">{{$adv->price}}€</h2>
                <h6><a href="{{route('public.advs.category', ['category'=>$adv->category_id])}}" class="text-decoration-none text-white">{{$adv->category->category_name}}</a></h6>
                <!-- STELLINE RECENSIONI IN CARD - NON UTILIZZATE PER ORA -->
                <!-- <div class="rating">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa grey fa-star" aria-hidden="true"></i>
                </div> -->
              </div>
            </div>
          </a>
        </div>
        @endforeach

      </div>
      </div>
    </div>
















</x-layout>