@extends('layouts.default')
@section('title', '')
@section("background", 'background-color:#171717;')
@section("style")
<style>
.form-control{
	border-radius: 0px;
	border:0px;
}
</style>
@endsection
@section('content')
<div class="container page-wrapper chiller-theme toggled">

 @include('components.sidebar-panel-user')
 @include('components.model-sidebar-panel-user')
     	
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="main-content">
                	<div class="configatuais col-xl-12 col-md-10">

                <button type="button" class="btn btn-demo toggle-sidebar" data-toggle="modal" data-target="#sidebarmodal">
                <div>
                    <span class="fas fa-bars"></span>
                </div>
                </button>
				<form class="form" action="{{route('store.store')}}" method="post" id="registrationForm" enctype="multipart/form-data">
					@csrf
                		<h3>Crie sua loja!</h3>
                		<div class="container bootstrap snippet">
							<div class="row">

								<div class="col-sm-3"><!--left col-->
									
									<script>
										function callInputFile(){

											$('#profileFile').click();
										}
										function urlValueInput($event){
											$('#url').value = $event.value;
										}
										function callBackgroundInput($event){
											$('#backgroundFile').click();

										}
									</script>
								  <div class="text-center" style="cursor:pointer;position:relative;justify-content:center;" >
									
									<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" onclick="callInputFile();" class="avatar-profile img-circle img-thumbnail" alt="avatar">
									
									<span  onclick="callInputFile();" style="cursor:pointer;text-align:center;font-size:1.4em;padding-top:4px;left:0px;margin-top:-35px;position:absolute;height:40px;background-color:#444;width:100%;">Update image</span>
									<input type="file" name="profileimg" class="text-center center-block profileimg-upload" id="profileFile" style="display:none;">
								  </div>							
								</div>

									<div class="col-sm-9">	
										<div class="background_img cursor-pointer mb-3" >										
										<img src="{{asset("/img/banner_default.jpg")}}" class="avatar-background" style="background-color:#ddd;border:solid 2px #fafafa;" onclick="callBackgroundInput();" height="auto" width="100%" alt="" style="margin-bottom:10px;">	
											<input type="file" name="backgroundimg" class="backgroundimg-upload" id="backgroundFile" style="display:none;">
										</div>

										  
									  <div class="tab-content">
										<div class="tab-pane active" id="home">
											  
												  <div class="form-group">
													  
													  <div class="col-xs-6">
														  <label for="first_name">Name</label>
														  <input type="text" class="form-control" onkeydown="urlValueInput(this);" name="name" id="name" title="enter your first name if any.">
													  </div>
												  </div>

												  <div class="form-group">
													  
													  <div class="col-xs-6">
														<label for="last_name">Description</label>
														<textarea name="description" class="form-control" id="last_name" cols="30" rows="10"></textarea>
														
														</div>
												  </div>
												  <div class="form-group">
													   <div class="col-xs-12 text-right">
															<br>
																<button class="btn-search" type="submit" style="padding:10px;"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
																<a href="/control-panel/store/create">
																 <button class="btn btn-lg" style="color:#ccc;" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
																</a>
														</div>
												  </div>
											  
										  
										
											</div>
										  
										 </div>						
										
									</div>
								</form>

            </div>
    </main>
    <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
</div>
{{-- container --}}
</div>
<script>
$(document).ready(function() {

    
var readProfileUrl = function(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('.avatar-profile').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

var readBackgroundUrl = function(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('.avatar-background').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}


$(".profileimg-upload").on('change', function(){
	readProfileUrl(this);
});

$(".backgroundimg-upload").on('change', function(){
	readBackgroundUrl(this);
});
});
</script>
@endsection