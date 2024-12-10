<?=$cabecera?>
  <a href="<?=base_url('crear')?>" class="btn btn-success">Registrar nuevo libro</a>   
       <table class="table table-hover">
           <thead class="thead-ligth">
            <tr>
                <td>#</td>
                <td>Imagen</td>
                <td>Nombre</td>
                <td colspan="2" class="text-center">
                    Acciones
            
               </td>
            </tr>
           </thead>
          <tbody>
         <?php 
         
         if(!empty('$libros')){
            foreach ($libros as $key => $libro) {
                ?>
                   <tr>
                <td><?=$key+1?></td>
             <td> <img src="<?=base_url()?>/uploads/<?=$libro['imagen']?>" width="100" height="100"></td>  
               
                <td><?=$libro['nombre']?></td>
                <td> <a class="btn btn-primary" href="<?=base_url()?>editar?id=<?=$libro['id']?>">  Editar</a></td>
                <td> <a class="btn btn-danger" href="<?=base_url()?>borrar?id=<?=$libro['id']?>">  Borrar</a></td>
            </tr>
                
                <?php
            }
         }
         
         ?>
          </tbody> 
       </table> 
   
       <?=$piepagina?>