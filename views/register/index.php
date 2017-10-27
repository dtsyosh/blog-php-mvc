<div class="card my-4">
    <h5 class="card-header">Cadastrar</h5>
    <div class="card-body">
        <form action="<?php echo URL;?>register/create" method="post">
            <div class="form-group">
            Nome<br> <input type="text" name="name" id="">    
            </div>
            <div class="form-group">
            Email<br> <input type="email" name="email" id="">
            </div>
             <div class="form-group">
            Senha<br> <input type="password" name="password" id="">
            </div>
            <input type="submit" value="Enviar">       
        </form>
    </div>
</div>