<x-layout>

    @if($adv)
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">

            <h2 class="card-title text-center">{{$adv->title}}</h2>

            <div class="row justify-content-center">

            @foreach ($adv->images as $image)

                    <div class="col-10 col-md-3 my-1 d-flex align-items-center border-start border-top border-bottom border-dark">
                        <img src="{{$image->getUrl(267, 400)}}" class="card-img-top" alt="...">
                    </div>
                    <div class="col-10 col-md-2 my-1 border-end border-top border-bottom border-dark me-1">
                        <b>Labels</b>
                        <ul>
                            @if ($image->labels)
                            @foreach ($image->labels as $label)
                            <li>{{$label}}</li>
                            @endforeach

                            @endif
                        </ul>

                        @switch($image->adult)
                            @case('VERY_LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Adult content</div>
                                @break
                            @case('LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Adult content</div>
                                @break

                            @case('POSSIBLE')
                                <div class="text-warning"><i class="fas fa-exclamation-triangle"></i> Possible adult content</div>
                                @break
                            @default
                                <div class="text-success"><i class="fas fa-check-circle"></i></i> No adult content</div>
                        @endswitch

                        @switch($image->spoof)
                            @case('VERY_LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Spoof content</div>
                                @break
                            @case('LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Spoof content</div>
                                @break

                            @case('POSSIBLE')
                                <div class="text-warning"><i class="fas fa-exclamation-triangle"></i> Possible spoof content</div>
                                @break
                            @default
                                <div class="text-success"><i class="fas fa-check-circle"></i></i> No spoof content</div>
                        @endswitch

                        @switch($image->medical)
                            @case('VERY_LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Medical content</div>
                                @break
                            @case('LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Medical content</div>
                                @break

                            @case('POSSIBLE')
                                <div class="text-warning"><i class="fas fa-exclamation-triangle"></i> Possible medical content</div>
                                @break
                            @default
                                <div class="text-success"><i class="fas fa-check-circle"></i></i> No medical content</div>
                        @endswitch

                        @switch($image->violence)
                            @case('VERY_LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Violent content</div>
                                @break
                            @case('LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Violent content</div>
                                @break

                            @case('POSSIBLE')
                                <div class="text-warning"><i class="fas fa-exclamation-triangle"></i> Possible violent content</div>
                                @break
                            @default
                                <div class="text-success"><i class="fas fa-check-circle"></i></i> No violent content</div>
                        @endswitch

                        @switch($image->racy)
                            @case('VERY_LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Racy content</div>
                                @break
                            @case('LIKELY')
                                <div class="text-danger"><i class="fas fa-exclamation-triangle"></i> Racy content</div>
                                @break

                            @case('POSSIBLE')
                                <div class="text-warning"><i class="fas fa-exclamation-triangle"></i> Possible racy content</div>
                                @break
                            @default
                                <div class="text-success"><i class="fas fa-check-circle"></i></i> No racy content</div>
                        @endswitch


                    </div>

                    @endforeach
                </div>


            <div class="text-center">
                <h6>{{__('ui.revisor_advertisementId')}} # <span class="text-primary">{{$adv->id}}</span></h6>
                <h6>{{__('ui.create_descriptionAdv')}}: <span class="text-primary">{{$adv->description}}</span></h6>
                <h6>{{__('ui.create_priceAdv')}}: <span class="text-primary">{{$adv->price}}</span></h6>




                <h6>{{__('ui.revisor_category')}}: <span class="text-primary">{{$adv->category->category_name}}</span></h6>
                <h6>{{__('ui.revisor_createdOn')}}: <span class="text-primary text-primary">{{$adv->created_at->format('d/m/Y')}}</span></h6>
                <h6 class="card-text">{{__('ui.revisor_createdBy')}}: <span class="text-primary">{{$adv->user->name}} - {{$adv->user->id}}</span></h6>
                <h6 class="card-text">Email: <span class="text-primary">{{$adv->user->email}}</span></h6>
            </div>


            <div class="row">
                <div class="col-12 d-flex justify-content-center">

                    <form class="mx-2 my-3" action="{{route('revisor.accept', $adv->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mt-2">{{__('ui.revisor_acceptButton')}}</button>
                    </form>


                    <form class="mx-2 my-3" action="{{route('revisor.reject', $adv->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger me-0 mt-2">{{__('ui.revisor_rejectButton')}}</button>
                    </form>
                </div>


            </div>

        </div>
    </div>

@else
<div class="container mt-5">
    <div class="row align-items-center justify-content-center mt-5">
        <div class="col-12 text-center mt-5">
            <h3 class="mt-5">{{__('ui.revisor_zeroAdvertisements')}}</h3>
        </div>
    </div>
</div>

@endif


</x-layout>