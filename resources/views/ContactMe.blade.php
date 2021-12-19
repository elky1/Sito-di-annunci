<x-layout>

    <div class="container-fluid  containerRegister text-white ">
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12  formRegister">
              <h1 class="h1accedi my-2">{{__('ui.contact_contactUs')}}! </h1>
              <form method="POST" action="{{route('contact.submit')}}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputName" class="form-label">{{__('ui.contact_contactNameSurname')}}</label>
                  <input type="text" name="user_name" class="form-control" id="exampleInputName" aria-describedby="emailName">
                </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email</label>
                  <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                  <label for="exampleInputMessage" class="form-label">{{__('ui.contact_contactReason')}}</label>
                  <textarea name="user_message" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-dark  mb-2">{{__('ui.contact_sendButton')}}</button>
              </form>

            </div>
        </div>
    </div>

</x-layout>