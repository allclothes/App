@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create product</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form enctype="multipart/form-data"  action="{{ route('product.store') }}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <input type="file" name="images[]" class="form-control" multiple>
                            </div>



                                <div class="form-group">
                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="nome" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                                          <option value="roupas">Roupas</option>
                                          <option value="cozinha">Cozinha</option>
                                          <option value="banho">Banho</option>
                                          <option value="animal">Animal</option>
                                          <option>5</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                            <label for="exampleFormControlInput1">Preço</label>
                                            <input type="text" name="cost" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                          </div>
                                          <div class="form-group">
                                                <label for="exampleFormControlInput1">Quantidade</label>
                                                <input type="number" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                              </div>
                                     
                                      <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descrição</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                      </div>

                                      <input type="submit" class="btn btn-success" value="Publicar">


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection