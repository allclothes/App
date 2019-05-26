@extends('layouts.control-panel_layout')
@section('body-content')
<div class="card" style="background:transparent;">
    <h3 >Create product</h3>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <form enctype="multipart/form-data" action="{{ route('product.store') }}" method="POST">
            @csrf
            <script>
                $(document).ready(function () {
                    $('#img-content').on('click', function () {
                        $('#images-product').click();
                    });
                    $('#images-product').change(function () {
                      $('#img-content').html('');
                        const images = $("#images-product")[0].files;                      

                        $('#img-count').html(images.length + ' imagens carregadas.');
                        $('#img-content').css('display', 'none');
                        $('#carouselExampleIndicators').css('display', 'block');
                        for (let index = 0; index < images.length; index++) {
                          fileChanges(images[index], index);
                         }
                    });
                    function fileChanges(x, count){           
                        var reader = new FileReader();

                                reader.onload = function (e) {
                                  console.log(count);
                                  if(count == 0){
                                    $('#carousel-inner').append("<div class='carousel-item active'><img class='d-block w-100' src='"+ e.target
                                        .result + "' alt='"+count+" image'></div>");
                                  }else{
                                    $('#carousel-inner').append("<div class='carousel-item'><img class='d-block w-100' src='"+ e.target
                                        .result + "'alt='"+count+" image'></div>");
                                  }
                                    
                                }
                                reader.readAsDataURL(x);                              
                    }
                });

            </script>

            <div class="row">
                <div class="form-group col-sm-3">

                    <div id="carouselExampleIndicators" style="width:100%;height:200px;display:none;" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" id="carousel-inner">
                          {{-- <div class="carousel-item active">
                            <img class="d-block w-100" src="..." alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                          </div> --}}
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                        
                    <div id="img-content" style="background-position:100%;:100%;height:200px;background-color:#000;cursor:pointer;border:solid 2px #fafafa;text-align:center;text-align: center;
                                vertical-align: middle;
                                line-height: 200px;position:relative;">Selected images <i class="fas fa-upload"></i></div> 

                                <div class="text-center">
                        <small id="img-count"></small>
                    </div>
                    <input type="file" name="images[]" id="images-product" multiple hidden>
                </div>

                <div class="col-sm-9">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                            <option disabled selected>Escolha uma catégoria</option>
                            <option value="roupas">Roupas</option>
                            <option value="cozinha">Cozinha</option>
                            <option value="banho">Banho</option>
                            <option value="animal">Animal</option>
                            <option value="eletronicos">Eletronicos</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="nome" name="name" class="form-control" id="exampleFormControlInput1"
                            placeholder="Camisa social Simples">
                    </div>
                </div>

            </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Descrição</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="row">


              <div class="form-group col-sm-6">

              <label for="inlineFormInputGroupUsername2">Preço</label>
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                </div>
                <input type="text" name="cost" data-mask="000.000.000.000.000,00" data-mask-reverse="true" class="form-control" id="inlineFormInputGroupUsername2" placeholder="0,00">
              </div>
        </div>
       
        <div class="form-group col-sm-6">
            <label for="exampleFormControlInput1">Quantidade</label>
            <input type="number" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="0">
        </div>
    </div>



    <div clas="text-right" style="text-align: right;">
        <input type="submit" class="btn btn-success" value="Publicar">
    </div>


    </form>
</div>
</div>

@endsection
