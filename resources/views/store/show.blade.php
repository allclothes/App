@extends('layouts.default')
@section('title', '- Pagina')
@section('content')


@foreach ($store as $s)


<div class="page-wrapper">
    <div class="paymefull">

        <div align="left">
            <div class="row">
                <div class="col-md-12" style="padding-right:10px;" align="center">
                    <div class="allpage" style="background-color:#070707;">
                        <div class="page-content" align="left">
                            <div class="header-page" style="display:block;">
                                <div class="page-capa popbg" style="
background-size: 100%;    
background-position:center;
            background-image:url(/img/stores/{{$s->backgroundimg}});
            
    background-color:#333333;">
                                </div>

                            </div>
                            <div class="title-line">

                                <div class="name-inline">
                                    <div class="user-quadro">
                                        <div class="img-profile">
                                            <a class="pop">
                                                <img src="{{asset('img/stores/'.$s->profileimg)}}" alt="">
                                            </a>

                                        </div>
                                    </div>
                                    <span class="title-page" style="width: 100%;
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;margin-right: 5px;">{{$s->name}}</span>
                                    <span class="desc-page">{{ $s->instagram ? '' : $s->instagram }}</span>

                                </div>


                            </div>

                        </div>


                        <div class="row" style="margin:0 0 0 0;min-height: 750px;">
                            <div class="sobre col-md-3" align="left">

                                <h3 class="header-index">Sobre</h3>

                                <div class="sobre-content">
                                    <p style="color:#fff;">
                                        {{ $s->description }}
                                    </p>
                                    <hr class="hr">
                                    @if(isset($s->instagram) || isset($s->facebook))
                                    <div class="col-md-12" align="center" style="padding:0 0 0 0;margin:0 0 0 0;">
                                        <ul class="rede-social">

                                          @if(isset($s->instagram))
                                            <a href="#" target="_blank">
                                                <li><i class="fab fa-instagram"></i> {{$s->instagram}} </li>
                                            </a>
                                            @endif
                                            @if(isset($s->facebook))
                                            <a href="#" target="_blank">
                                                <li><i class="fab fa-facebook"></i> {{$s->facebook}}</li>
                                            </a>
                                            @endif

                                        </ul>
                                    </div>
                                    @endif


                                </div>

                                <h3 class="header-index">Outros</h3>

                                <div class="fotos-content col-md-12 text-center" id="fotos-content"
                                    style="padding-bottom: 10px;">
                                    <div class="row text-left">

                                        
                                            @if(count($others)>0)
                                            @foreach($others as $o)
                                            @php
                                                    
                                                    $img = json_decode($o->images);
                                            @endphp
                                            <a href="/{{getStoreNameByStoreId($o->store_id)}}/{{$o->url}}">
                                            <div class="card" style="margin-bottom:20px;border-radius:0px;background-color:transparent;width:10em;">
                                                <img class="card-img-top" src="{{asset('img/product_images/'.$img[0])}}" alt="{{$o->name}}">
                                                <div class="card-body" style="word-wrap: nowrap;margin:0;padding:0;">
                                                    <span style="width: 100%;
                                                    white-space: nowrap;
                                                    overflow: hidden;
                                                    text-overflow: ellipsis;">{{$o->name}}</span> - 
                                                <small>{{getStoreNameByStoreId($o->id)}}</small>			
                                                </div>
                                            </div>
                                        </a>
                                            @endforeach
                                            @endif

                                    </div>
                                </div>
                            </div>

                            <div class="content col-md-9" align="left" style="">


                                <h3 class="header-index">
                                    Vitrine
                                </h3>
                                <div class="container-full">


                                    <div class="albuns-row" style="display:none;">
                                        <div class="row reset-mp">

                                          @if(count($products) > 0)
                                            @foreach ($products as $p)  
                                            @php
                                                $imgs = json_decode($p->images);
                                            @endphp                                              
                                            
                                            <div
                                                class="spaces-card col-xl-3 col-md-4 col-sm-6"
                                                style="padding:0 5px 10px 0px;margin-bottom: 10px;">

                                                <div class="card bg-transparent" style="border-radius:0 0 0 0;">

                                                    <a href="{{asset("img/product_images/".$imgs[0])}}"
                                                        data-type="image" data-disable-external-check="false"
                                                        data-toggle="lightbox" data-gallery="album-shot-{{$p->id}}"
                                                        data-title="{{$p->name}}">

                                                        <div class="imgbox-card">
                                                            <img src="{{asset('img/product_images/'.$imgs[0])}}"
                                                                alt="Card image cap" style="width:250px;height:150px;">

                                                        </div>

                                                        @foreach ($imgs as $img)                                                  
 
                                                      <div data-toggle="lightbox" data-gallery="album-shot-{{$p->id}}"
                                                            data-remote="{{asset('img/product_images/'.$img)}}"
                                                      data-title="{{$p->name}}">

                                                        </div>
                                                        @endforeach

                                                    </a>

                                                    <div class="card-body" style="padding:5px 0 0 0;">

                                                        <p class="card-text album-title">
                                                        <a href="/{{$s->name}}/{{$p->url}}" style="color:#ff3000;">{{$p->name}}
                                                            </a>
                                                            <button
                                                                class="float-right btn-showdesc bg-transparent cursor-pointer border-0"
                                                                style="color:#ff3000;" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#openDescProduct-{{$p->id}}"
                                                                aria-controls="navbarToggleExternalContent"
                                                                aria-expanded="false" aria-label="Toggle navigation">
                                                                <i class="fas fa-sort-down"></i>
                                                            </button>
                                                        </p>


                                                        <div class="collapse" id="openDescProduct-{{$p->id}}">
                                                            <div class="show-desc"
                                                                style="font-size:0.8em;background-color: #3d3d3d;">
                                                                <span class="text-white">{{$p->description}}</span><br>
                                                                <small class="text-muted">{{$p->created_at}}</small>
                                                            </div>
                                                        </div>
                                                        {{-- <small class="text-muted font-weight-bold">vendidos</small>                                                         --}}
                                                        <div class="clearfix"></div>
                                                        <a href="/{{$s->name}}/{{$p->url}}">
                                                        <button class="btn-assinar" style="-webkit-transition: background-image 0.2s ease-in-out;
transition: background-image 0.2s ease-in-out;">Comprar por R$ {{  number_format($p->cost, 2, "," , ".")}}</button>
                                                    </div>
                                                </a>

                                                </div>
                                        </div>

                                        @endforeach
                                        @else
                                        <h5>Este usuario não possui nenhum produto =(</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>




                        </div>


                    </div>

                </div>
                <hr class="hr">

                @endforeach
                <div class="messeger" style="height:300px;text-align: left;position: relative;">
                    <h3 class="header-index"> Comentários</h3>

                    @if(count($comments) > 0)
                    @foreach ($comments as $c)
                        
                     <div class="chat-uniq" style="margin-bottom:30px;">
                        <div class="row" style="margin-left:0px;margin-bottom: 10px;">
                            <span class="name col align-self-center">{{$c->username}}</span></div>
                        <span class="mensagem"> {{$c->message}}</span>
                        <div class="details">
                            <span>{{ Carbon\Carbon::parse($c->created_at)->diffForHumans()}} </span>

                            <a href="">Deletar</a>
                            <a href="">Reportar</a>
                        </div>

                </div>

                    
                    @endforeach
                    @endif
                    <hr>


                <textarea name="" id="" class="input-msg" rows="4" placeholder="Comentar"></textarea>
                <button class="btn-subenviar">Enviar</button>
            </div>
        </div>
    </div>




</div>


</div>
</div>
</div>


</div>
@endsection
@section("footer")
@include("components.footer")
@endsection
