<!DOCTYPE html>

<!--Page Head-->
<head>
    <meta charset="UTF-8">   
</head>

<body>

<form>

        <!--Title-->
        <div class="panel panel-primary">
        <div class="panel-heading">Cadastro de Cliente</div>
        
        <div class="row">
            <div class="col-md-11 control-label">
                <p style="float: right;" class="help-block"><h11>*</h11> Campo Obrigatório </p>
            </div>
        </div>

        <!-- Text input NAME-->
        <div class="row">
            <div class="col-md-2">
                <label style="float: right;" for="Nome">Nome: <h11>*</h11></label>
            </div>   
            <div class="col-md-8">
                <input id="Nome" name="Nome" placeholder="" class="form-control input-md" required="" type="text">
            </div>
        </div></br>

        <!-- Text input CPF + Birthday + Sex-->
        <div class="row">
            <div class="col-md-2">
                <label style="float: right;" for="Nome">CPF: <h11>*</h11></label>  
            </div>
            <div class="col-md-2">
                <input id="cpf" name="cpf" placeholder="Apenas números" class="form-control input-md" required="" type="text" maxlength="11" pattern="[0-9]+$">
            </div>
            <div class="col-md-1">
                <label style="float: right;" for="Nome">Nascimento:<h11>*</h11></label>
            </div>  
            <div class="col-md-2">
                <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="col-md-1">
                <label style="float: right;" for="radios">Sexo: <h11>*</h11></label>
            </div>
            <div class="col-md-4"> 
            <label required="" class="radio-inline" for="radios-0" >
            <input name="sexo" id="sexo" value="feminino" type="radio" required>
            Feminino
            </label> 
            <label class="radio-inline" for="radios-1">
            <input name="sexo" id="sexo" value="masculino" type="radio">
            Masculino
            </label>
            </div>
        </div></br>

        <!-- Text input PHONE-->
        <div class="row">
            <div class="col-md-2">
                <label style="float: right;" for="prependedtext">Telefone: <h11>*</h11></label>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                    OnKeyPress="formatar('## #####-####', this)">
                </div>
            </div>
            
            <div class="col-md-1">
                <label style="float: right;" for="prependedtext">Telefone:</label>
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" type="text" maxlength="13"  pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
                    OnKeyPress="formatar('## #####-####', this)">
                </div>
            </div>
        </div></br> 

        <!-- Text input EMAIL-->
        <div class="row">
            <div class="col-md-2">
            <label style="float: right;" for="prependedtext">Email: <h11>*</h11></label>
            </div>
            <div class="col-md-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    </div>
                    <input id="prependedtext" name="prependedtext" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
                </div>
            </div>
        </div></br>


        <!-- Search input-->
        <div class="row">
            <div class="col-md-2">
                <label style="float: right;" for="CEP">CEP: <h11>*</h11></label>
            </div>
            <div class="col-md-2">
                <input id="cep" name="cep" placeholder="Apenas números" class="form-control input-md" required="" value="" type="search" maxlength="8" pattern="[0-9]+$">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
            </div>
        </div></br>

        <!-- Text Input ADDRESS-->
        <div class="row">
            <div class="col-md-2">
                <label style="float: right;" for="prependedtext">Endereço:</label>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rua</span>
                    </div>
                <input id="rua" name="rua" class="form-control" placeholder="" required="" readonly="readonly" type="text">
                 </div>
    
            </div>
        <div class="col-md-2">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nº: <h11>*</h11></span>
                </div>
            <input id="numero" name="numero" class="form-control" placeholder="" required=""  type="text">
            </div>
        </div>
  
        <div class="col-md-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Bairro</span>
                </div>
            <input id="bairro" name="bairro" class="form-control" placeholder="" required="" readonly="readonly" type="text">
            </div>   
        </div>
        </div></br>

        <div class="row">
            <div class="col-md-2">
            </div>
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cidade</span>
                </div>
            <input id="cidade" name="cidade" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
            </div>    
        </div>
  
        <div class="col-md-2">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Estado</span>
             </div>
        <input id="estado" name="estado" class="form-control" placeholder="" required=""  readonly="readonly" type="text">
        </div>   
        </div>        
        </div></br> 

        </div>  

        <!-- Button (Double) -->
        <div class="row">       
        <label class="col-md-2 control-label" for="Cadastrar"></label>
        <div class="col-md-8">
            <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
            <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
        </div>
        </div>    
</form>

</body>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{ asset('js/register.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/register.css')}}"> 

</html>