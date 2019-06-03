@extends('layouts.default')
@section('title', '')
@section("background", 'background-color:#171717;')
@section('content')
<div class="container page-wrapper chiller-theme toggled">
    

 @include('components.sidebar-panel-user')
 @include('components.model-sidebar-panel-user')
     	
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">

                <div class="main-content">
                	<div class="configatuais col-xl-12 col-md-10">

                <button type="button" id="btn-sidemodal" class="btn btn-demo toggle-sidebar" data-toggle="modal" {{-- data-target="#sidebarmodal" --}}>
                <div>
                    <span class="fas fa-bars"></span>
                </div>
                </button>

                {{-- <button class="btn btn-primary" id="sidebar-modal" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                     Collapse
                </button> --}}


                		<h3>Historico de compras</h3>
                		<div class="divtable">
                		<table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Custo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($phistory) > 0)
                            @foreach ($phistory as $ph)
                			<tr data-toggle="modal" data-target="#openph-{{$ph->id}}">
                				<td class="h">{{ \Carbon\Carbon::parse($ph->created_at)->diffForHumans() }}</td>
                				<td>R$ {{ number_format(getCartTotalCostByProductsHistoryId($ph->id), 2, ',', '.') }}</td>
                				<td>{{$ph->status}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">Você não possui nenhuma compra =(</td>
                            </tr>
                            @endif
                        </tbody>
                			     		
                        </table>
                        @if(count($phistory) > 0)
                            @foreach ($phistory as $ph)

                            <div class="modal fade" id="openph-{{$ph->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                      <div class="modal-content" style="border-radius:0px;">
                                        <div class="modal-header" style="background-color:#d72800;">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Compra ID {{$ph->id}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
    
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Produto</th>
                                                            <th>Quantidade</th>
                                                            <th>Custo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $total = 0;
                                                    @endphp
                                                      @foreach (getCartByProductHistoryId($ph->id) as $c)                                                  
                                                      
                                                        <tr>
                                                              <td>{{getProductNameById($c->product_id)}}</td>
                                                        <td>{{$c->quantity}}</td>
                                                        <td>R$ {{ number_format($c->cost, 2, ',', '.') }}</td>
                                                        </tr>
                                                        @php
                                                            $total += $c->cost
                                                        @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td>Total: R$ {{ number_format($total, 2, ',', '.') }}</td>
                                                        </tr>
      
                                                    </tbody>
                                                    
                                                </table>
                                                
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                            @endforeach
                            @endif
                        

                		</div>
                	
                </div>
                </div>
                

  
                <hr>
                
            </div>
    </main>
    <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
</div>
{{-- container --}}
</div>
@endsection