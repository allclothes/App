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
                
                <div class="body-content">

                	@yield('body-content')
                    
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