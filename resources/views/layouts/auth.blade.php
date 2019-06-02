<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("img/favicon.png")}}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pay.me @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
	
    <link rel="stylesheet" href="{{asset('/font-awesome/css/all.css')}}" >
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <script
    src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
        
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.maskedinput.js') }}"></script>

    <script src="{{ asset('/lightbox/ekko-lightbox.js') }}"></script>
    <link href="{{ asset('/lightbox/ekko-lightbox.css') }}" rel="stylesheet">

    <script>
$(document).ready(function(){
  $('.cpf').mask('000.000.000-00', {reverse: true});
});
    </script>
<script>
    function mascaraData(val) {
  var pass = val.value;
  var expr = /[0123456789]/;

  for (i = 0; i < pass.length; i++) {
    // charAt -> retorna o caractere posicionado no índice especificado
    var lchar = val.value.charAt(i);
    var nchar = val.value.charAt(i + 1);

    if (i == 0) {
      // search -> retorna um valor inteiro, indicando a posição do inicio da primeira
      // ocorrência de expReg dentro de instStr. Se nenhuma ocorrencia for encontrada o método retornara -1
      // instStr.search(expReg);
      if ((lchar.search(expr) != 0) || (lchar > 3)) {
        val.value = "";
      }

    } else if (i == 1) {

      if (lchar.search(expr) != 0) {
        // substring(indice1,indice2)
        // indice1, indice2 -> será usado para delimitar a string
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }

    } else if (i == 4) {

      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
        continue;
      }

      if ((nchar != '/') && (nchar != '')) {
        var tst1 = val.value.substring(0, (i) + 1);

        if (nchar.search(expr) != 0)
          var tst2 = val.value.substring(i + 2, pass.length);
        else
          var tst2 = val.value.substring(i + 1, pass.length);

        val.value = tst1 + '/' + tst2;
      }
    }

    if (i >= 6) {
      if (lchar.search(expr) != 0) {
        var tst1 = val.value.substring(0, (i));
        val.value = tst1;
      }
    }
  }

  if (pass.length > 10)
    val.value = val.value.substring(0, 10);
  return true;
}

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".cpf").mask("999.999.999-99");
        $('.date').mask('00/00/0000');

    });
</script>
<style>
    .form-control{
        border-radius:0px !important; 
    }
    select {
        border-radius: 0px !important;
    }
button:focus
{
    outline:none;
}
input[type=submit]
{
    outline:none;
}
body
{
background-color: #b2505c;
background-image: linear-gradient(315deg, #ff3000 0%, #000 35%);
background-attachment: fixed;

}
.allpage
{

}
.register{

    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.form-nascimento
{
    width: 100%;
    display:inline-block
}
.form-nascimento label
{
 
    color: #53575a;
    padding-left:0.375rem;

}
.tab-content
{
    text-align: center;
}
.form-nascimento select
{
    width: 32.3%;
    font-size: 1rem;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    background-color: #fff;
    color: #495057;
    border: 1px solid #ced4da;

    padding: 0.375rem 0.75rem;


}
.select
{
        display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: auto;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    text-align: center;
    margin-top: 10%;
}
.btnRegister{
    /*float: right;*/
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background:#4c131a;
    /*background: #0062cc;*/
    color: #fff;
    font-weight: 600;
    transition: all .5s ease; 
    width: 50%;
    cursor: pointer;
}
.btnVoltar{
    /*float: right;*/
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background:#525252;
    /*background: #0062cc;*/
    color: #fff;
    font-weight: 600;
    transition: all .5s ease; 
    width: 30%;
    cursor: pointer;
}
.btnVoltar:hover
{
    background-color:#000;
}
.btnRegister:hover
{
    background:#9f0000;

}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background:#4c131a;

    /*background: #0062cc;*/
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #4c131a;
    border: 2px solid #4c131a;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
.form-group input:focus
{
    -webkit-box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
-moz-box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
    border:1px #ff3000 solid;    

}
.form-group select:focus
{
    outline:none;
    -webkit-box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
-moz-box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
box-shadow: 0px 0px 1px 0px rgba(255,48,0,1);
    border:1px #ff3000 solid;    

}
a:hover
{
    outline: 0;
    text-transform: none;
    text-decoration: none;
}
</style>


</head>
<body>
        @if(session('error') || session('success'))
        <script>
          $(function(){
            $('#warningToast').toast({delay:5000});
            $('#warningToast').toast('show');
          });
        </script>
        <div aria-live="polite" aria-atomic="true" style="z-index:9999999;position: fixed; top: 5em; right: 20px;min-height:200px;" >
          <div class="toast" id="warningToast">
          <div class="toast-header {{session('error') ? 'bg-warning' : 'bg-info'}}">
                <i class="{{session('error') ? 'fas fa-exclamation-circle' : 'fas fa-check-double'}}"></i>
              <strong class="mr-auto">&nbsp;&nbsp;{{session('error') ? 'Ops!' : 'Heyy!'}}</strong>        
              <small>Agora</small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body" style="color:#212529;">
              {{session('error') ? session('error') : session('success')}}
            </div>
          </div>
        </div>
        @endif
        
    <div id="app">

        @yield('content')

    </div>    
</body>
</html>
