@extends('adminlte::page')

@section('title', 'CRUD Post')

@section('content_header')
<h1>
    Posts
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de posts</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Ubicacion</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->category->titulo}}</td>
                            <td>{{$post->descripcion}} </td>
                            <td>{{$post->precio}} </td>
                            <td>{{$post->ubicacion}} </td>
                            <td>
                            <img src="{{asset($post->featured)}}" alt="{{ $post->title }}" class="img-fluid" width="100px">
                            </td>
                            <td> 
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-post-{{$post->id}}">
                                Editar
                            </button>
                            <form action="{{route('Administrador.posts.delete', $post->id)}}" method="post">
                                {{ csrf_field() }}
                                @method('delete')
                                <button class="btn btn-danger"> Eliminar</button>
                            </form>
                            
                            </td>
                        </tr>
                        <!-- modal update post -->
                    @include('Administrador.posts.modal-update-post')
         <!-- /.modal-dialog -->
<!-- /.modal -->
                        @endforeach
                        
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>

            <form action="{{ route('Administrador.posts.store') }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-gorup">
                    <label for="category-id">titulo del post</label>
                    <select name="category_id" id="category-id" class="form-control"> 
                        <option value=""> Seleccionar titulo de post</option>
                        @foreach ($categories as $category)
                        <option value ="{{$category->id}}">{{$category->titulo}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-gorup">
                    <label for="descripcion"> descripcion</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10"> </textarea>
                </div>
                <div class="form-gorup">
                    <label for="precio"> Precio</label>
                    <input type="text" name="precio" class="form-control" id="precio">
                </div>
                <div class="form-gorup">
                    <label for="ubicacion"> ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion">
                </div>

                <div class="form-group">
                   <label for="featured">Imagen principal</label>
                   <input type="file" name="featured" class="form-control" id="featured">
               </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-outline-primary">guardar</button>
            </div>
            </form>

        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@stop

@section('js')
<script>
$(document).ready(function() {
    $('#posts').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop