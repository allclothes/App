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


                		<h3>Configurações gerais da conta</h3>
                		<div class="divtable">
                		<table class="col-md-12">
                			<tr>
                				<td class="h">Nome</td>
                				<td>{{auth::user()->name . ' ' .  auth::user()->lastname}}</td>
                				 <td>
							<!--	<span class="edit">Editar</span>-->
								</td> 
                			</tr>
                			<tr>
                				<td class="h">Apelido</td>
                				<td>{{auth::user()->username}}</td>
                				 <td>
								<!--<span class="edit">Editar</span>-->
								</td> 
                			</tr>
                			<tr>
                				<td class="h">Data de nascimento:</td>
                				<td>{{ auth::user()->birthday}}</td>
                				<td>
								<!-- <span class="edit">Editar</span> -->
								</td>
                			</tr>
                			<tr>
                				<td class="h">E-mail</td>
                				<td>{{auth::user()->email}}</td>
                				<td>
								<!-- <span class="edit">Editar</span> -->
								</td>
                			</tr>
                			<tr>
                				<td class="h">Tipo de conta</td>
								<td>{{ Auth::user()->storename == null ? 'Cliente' : 'Vendedor' }}</td>  
								<td></td>              				
                			</tr>                		
                		</table>
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