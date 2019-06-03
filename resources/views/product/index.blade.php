@extends('layouts.control-panel_layout')
@section('body-content')
<div class="all-products">
<h3>Meus produtos</h3>
<hr>
                		<div>
                      @if(count($products) > 0)
                            @foreach ($products as $p)

                            <div class="card col-sm-4 col-md-3" style="background:transparent;">                                   
                                <span class="b-2" style="font-size:1.2em;">{{$p->name}}</span>
                                @php
                                    $img = json_decode($p->images);
                                @endphp
                                <img class="card-img-top" src="{{asset('img/product_images/'.$img[0]) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col">
                                            <a style="cursor:pointer;" data-toggle="modal" data-target="#editProductModal-{{$p->id}}">Edit</a>
                                            </div>
                                            <div class="col">
                                              <form action="{{route('product.destroy', $p->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" style="border:none;background:transparent;color:#fafafa;" onclick="return confirm('Você está certo que quer deletar este produto?');">Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                              
                                </div>
                            </div>


                        <div class="modal fade" id="editProductModal-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit product {{$p->name}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="{{route('product.update', $p->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')

                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="form-group col-sm-6">
                                                <input type="hidden" value="{{$p->id}}" name="id">

                                                    <label for="inlineFormInputGroupUsername2">Preço</label>
                                                    <div class="input-group mb-2 mr-sm-2">
                                                      <div class="input-group-prepend">
                                                        <div class="input-group-text">R$</div>
                                                      </div>
                                                    <input type="text" name="cost" value="{{$p->cost}}" data-mask="000.000.000.000.000,00" data-mask-reverse="true" class="form-control" id="inlineFormInputGroupUsername2" placeholder="0,00">
                                                    </div>
                                              </div>

                                             <div class="form-group col-sm-6">
                                                <label for="value">Quantity</label>
                                                <input type="number" name="amount" class="form-control" value="{{$p->amount}}" id="value">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                            <textarea name="description" class="form-control" id="descr" rows="3">{{$p->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                  </div>

                                @endforeach
                                    
                                @else
                                    
                                <p>Você não possui ainda não tem produtos. Começe <a href="{{route('product.create')}}"> adicionando agora!</a></p>
                                @endif

                        </div>
                </div>
@endsection