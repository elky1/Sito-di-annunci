<x-layout>


        
            <div class="container-fluid containerRegister vh-100 ">
                <div class="row justify-content-center align-items-center   py-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-center align-items-center p-3 text-center formRegister">
                <div class="col-12  h1accedi">
                    <h1>{{__('ui.navbar_welcomeUserAuthLogin')}}</h1>
                </div>
                
                
                
                
                
                
                <form action="{{route('login')}}" method="POST" class="text-white">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" name='email' id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password: </label>
                        <input type="password" class="form-control" name='password' id="password" aria-describedby="passwordlHelp">
                    </div>
                    
                    <button type="submit" class="btn btn-dark">{{__('ui.navbar_welcomeUserAuthLogin')}}</button>
                    <a class="text-white"href="{{route('register')}}">{{__('ui.not_registered')}}</a>
                </form>
                
            </div>
                </div> 
        </div>
        





</x-layout>