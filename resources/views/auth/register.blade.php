<x-layout>



    

        <div class="container-fluid containerRegister vh-100">
            <div class="row justify-content-center align-items-center   py-5">
            <div class="row justify-content-center align-items-center text-center formRegister my-5 ">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="col-12 ">
                    <h1>{{__('ui.navbar_welcomeUserAuthRegister')}}</h1>
                </div>
                
                
                
                
                
                
                <form action="{{route('register')}}" method="POST" class="text-white">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.user_name')}}: </label>
                        <input type="text" class="form-control" name='name' id="ename" aria-describedby="namelHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" class="form-control" name='password' id="password" aria-describedby="passwordlHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{__('ui.confirm_password')}}: </label>
                        <input type="password" class="form-control" name='password_confirmation' id="password_confirmation" aria-describedby="passwordconfirmationlHelp">
                    </div>
                    <button type="submit" class="btn btn-dark">{{__('ui.navbar_welcomeUserAuthRegister')}}</button>
                    <a class="text-white" href="{{route('login')}}">{{__('ui.already_registered')}}</a>
                </form>
            </div>
        </div>
        </div>
            

    


</x-layout>