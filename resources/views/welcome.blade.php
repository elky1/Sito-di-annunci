<x-layout>


  <div class="container-fluid">
    <div class="row">
      @if (session('message'))
        <div class="alert alert-success m-0">
            <p>{{__('ui.error_advStore')}}</p>
        </div>
      @endif

      @if (session('access.denied.revisor.only'))
        <div class="alert alert-danger">
            {{session('access.denied.revisor.only')}}
        </div>
      @endif
  </div>
    {{-- header --}}
  <div class="row header">
    <div class="row ">
      <div class="col-12 ">
      <h1 class="h1presto">Presto.it</h1>
      <p class="parheader">{{__('ui.paragraph')}}</p>
      @auth
      <a href="{{route('adv.create')}}" class="btn btn-dark btn-md header-button "><i class="fas fa-plus"></i> {{__('ui.header_insertAdvButton')}}</a>
      @endauth
      </div>

    </div>
  </div>

        {{-- fine header --}}
        {{-- fine header --}}


  <div class="row boxultimiannunci">
    <div class="row  ">
      <div class="col-12">
          <h1 class="ultimiannunci">{{__('ui.welcome_lastAdvs')}}</h1>
      </div>
    </div>
  </div>
  {{-- nuove card  --}}

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




</x-layout>