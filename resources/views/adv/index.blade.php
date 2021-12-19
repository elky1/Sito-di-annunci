<x-layout>



  @foreach ($advs as $adv)
   <div>{{$adv->category->category_name}}</div>
  @endforeach



  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
      <h3>DEBUG:: SECRET {{$unique_secret}}</h3>
    </div>
  </div>















</x-layout>