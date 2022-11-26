@extends('layouts.app')
@section('content')
<section class="container-fluid content py-5">
        <div class="row justify-content-left">
            <!-- Post -->
            <div class="col-12 col-md-7 text-center">
                <h1>{{$post->encabezado}}</h1>
                <h1  > <FONT SIZE=5><i>{{$post->category->titulo}}</i> </font></h1>
                <hr>
                <img src="{{asset($post->featured)}}" alt="{{$post->encabezado}}" class="img-fluid">

                <p class="text-left mt-3 post-txt">
                   
                    <span class="float-right">Publicado:{{$post->created_at->diffForHumans()}}</span>
                </p>
                <p align=justify>
                    {{$post->descripcion}}
                </p>

                <p align=left>
                   <b> Ubicacion :</b> {{$post->ubicacion}}
                </p>

                <p align=left>
                    <b>Precio: </b>{{$post->precio}}
                </p>

               
                <!--<p class="text-left post-txt"><i>{{$post->category->titulo}}</i></p>-->
            </div>

            <!-- Entradas recientes -->
           <!-- <div class="col-md-3 offset-md-1">
                <p><i>Lo más reciente</i></p>
                
                @foreach($latesPosts as $post)
                <div class="row mb-4">
                    <div class="col-4 p-0">
                        <a href="{{route('post', $post->id)}}">
                            <img src="{{asset($post->featured)}}" class="img-fluid rounded" width="100" alt="{{$post->encabezado}}">
                        </a>
                    </div>
                    <div class="col-7 pl-0">
                        <a href="{{route('post', $post->id)}}" class="link-post">{{$post->encabezado}}</a>
                    </div>
                </div>

                @endforeach-->

                
             
            </div>

        </div>
    </section>

   
    @endsection
  <!-- agrega aquí el footer -->