<div class="modal fade" id="modal-update-post-{{$post->id}}">
        <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">actualizar Post</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>

            <form action="{{ route('Administrador.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field() }}
            <div class="modal-body">
               

                <!--PARA MODIFICAR LA CATEGORIA-->

                <div class="form-group">
                        <label for="category_id">Titulo</label>
                        <select name="category_id" id="category-id" class="form-control" >
                       <option value=""> Elegir titulo</option>
                       @foreach($categories as $category)
                        <option value="{{$category->id}}" <?= $category->id == $post->category->id ? 'selected': '' ?> > {{$category->titulo}} </option>
                       @endforeach
                    </select>
                </div>

             <!--PARA MODIFICAR EL CONTENIDO DEL POST-->
                <div class="form-group">
                        <label for="descripcion">descripcion</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" cols="30" rows="10">{{$post->descripcion}}</textarea>
                </div>
                
             <!--PARA MODIFICAR EL PRECIO-->
                <div class="form-gorup">
                    <label for="precio"> precio</label>
                    <input type="text" name="precio" class="form-control" id="precio" value="{{$post->precio}}">
                </div>


             <!--PARA MODIFICAR LA UBICACION PENDIENTEEE EL GOOGLE-->
                <div class="form-gorup">
                    <label for="ubicacion"> ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion" value="{{$post->ubicacion}}">
                </div>

                <div class="form-group">
                       <!--PARA CAMBIAR TITULO DEL POST--> 
                            <label for="featured">Imagen principal</label>
                            <input type="file" name="featured" class="form-control" id="featured" >
                            <small>imagen actual</small> <br>
                            <img src="{{asset($post->featured)}}"  width="80px" class="img-fluid img-thumbnail" alt="{{$post->featured}}">
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
</div>