@extends('layouts.control-panel_layout')
@section('body-content')
<div class="all-products">
<h3>Meus produtos</h3>
                		<div>
                            @foreach ($products as $p)
                            <div class="card col-sm-4 col-md-3">                                   
                                <h6 class="card-subtitle mb-2 text-muted">{{$p->name}}</h6>
                                <img class="card-img-top" src="{{$p->images[0]}}" alt="Card image cap">
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col">
                                            <a style="cursor:pointer;" data-toggle="modal" data-target="#editProductModal-{{$p->id}}">Edit</a>
                                            </div>
                                            <div class="col">
                                            <a href="{{route('product.destroy', $p->id)}}" onclick="return confirm('Você está certo que quer deletar este produto?');">Delete</a>
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
                                        <form action="{{route('product.update')}}" method="POST">
                                            @csrf
                                            {{ method_field('PUT') }}
                                        <div class="modal-body">
                                            <div class="row">
                                            <input type="hidden" value="{{$p->id}}" name="id">

                                            <div class="form-group col-sm-6">
                                                <label for="value">Preço</label>
                                            <input type="text" name="cost" class="form-control" value="{{$p->cost}}" id="value">
                                             </div>

                                             <div class="form-group col-sm-6">
                                                <label for="value">Quantity</label>
                                                <input type="number" name="amount" class="form-control" value="{{$p->amount}}" id="value">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="desc">Description</label>
                                                <textarea name="description" class="form-control" id="descr" rows="3">
                                                    {{$p->description}}
                                                </textarea>
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

                        </div>
                </div>
@endsection