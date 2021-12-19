<x-layout>

    <div class="container-fluid containerRegister">

        <div class="container-fluid">
            <div class="row p-4 h1registrati align-items-center justify-content-center">
                <div class="col-12 text-center texy">
                    <h1>{{__('ui.create_insertAdv')}}</h1>
                </div>
            </div>
        </div>


        

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-8 card p-4 mt-3 formAnnunci my-5">




                    <form action="{{route('adv.store')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        {{-- <h3>DEBUG:: SECRET {{$unique_secret}}</h3> --}}
                        <input type="hidden" name="unique_secret" value="{{$unique_secret}}">
                        <div class="mb-3">
                            <label for="exampleInputTitle" class="form-label text-white">{{__('ui.create_titleAdv')}}</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputTitle" value="{{old('title')}}" aria-describedby="TitleHelp">
                            @error('title')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDescription" class="form-label text-white">{{__('ui.create_descriptionAdv')}}</label>
                            <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" id="exampleInputDescription" value="{{old('description')}}">

                            @error('description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        @foreach ($categories as $category)
                            <div class="form-check text-white">
                                <input class="form-check-input @error('category_id') is-invalid @enderror"  type="radio" name="category_id" id="{{$category->id}}" value="{{$category->id}}">
                                <label class="form-check-label" for="{{$category->id}}">
                                    {{$category->category_name}}
                                </label>
                            </div>
                        @endforeach








                        @error('category_id')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror




                        <div class="mb-3">
                            <label for="exampleInputPrice" class="form-label text-white">{{__('ui.create_priceAdv')}}</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="exampleInputPrice" value="{{old('price')}}">

                            
                        </div>
                        @error('price')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror

                        <div class="dropzone" id="drophere">
                            <div class="dz-message">{{__('ui.create_dropzoneTextArea')}}</div>
                        </div>

                

                        <button type="submit"  class="btn btn-dark my-3 btn-lg ps-5 pe-5">{{__('ui.create_createAdvButton')}}</button>
                    </form>
                    <div class="container section">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {{-- <form action="{{ route('dropzone.store') }}" method="POST" enctype="multipart/form-data" class="dropzone" id='image-upload'>
                                    @csrf
                                    <input name="unique_secret" value="{{$unique_secret}}">
                                    <div>
                                        <h3 class="text-center">Upload Multiple Image By Click On Box</h3>
                                    </div>
                                </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
{{--
    <script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
        };
    </script> --}}


</x-layout>