<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{Asset('css/app.css')}}">
  <title>Presto.com</title>
</head>



<body>

  <x-navbar></x-navbar>

  <div class="slotbody">
  {{$slot}}
</div>

  
  <div class="container-fluid py-0 my-0 footer">
    <div class="row align-items-center justify-content-center text-center ">
      <div class="col-12">
        <h3 class="my-3">{{__('ui.footer_followUs')}}</h3>
        <div class="iconesocial">
        <i class="fab fa-instagram fa-3x my-3 mx-5" id="iconainsta"></i>
        <i class="fab fa-facebook fa-3x my-3 mx-5" id="iconaface"></i>
        <i class="fab fa-linkedin fa-3x my-3 mx-5" id="iconalinke"></i>
        <i class="fab fa-pinterest fa-3x my-3 mx-5" id="iconapinte"></i>
        <i class="fab fa-twitter fa-3x my-3 mx-5" id="iconatwi"></i>
        <i class="fab fa-whatsapp fa-3x my-3 mx-5" id="iconawhat"></i>
      </div>
        
        <div class="mb-3 "><a class="text-dark lavoraconnoi" href="{{route('contact')}}">{{__('ui.footer_workWithUs')}}</a></div>
        <hr>
        <h4 class="mt-3">Presto.it</h4>
        <h5 class="mb-4">📍 via Roma 49, {{__('ui.footer_city')}} | ✉ presto@presto.com | 📞 03812 | fax: 13121312  </h5>


      </div>
    </div>
  </div>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>


  <script src="{{Asset('js/app.js')}}"></script>
  <!-- Fontawesome -->
  <script src="/fontawesome.js"></script>
</body>
</html>