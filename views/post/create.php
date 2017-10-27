<h1> Criar Publicações</h1> <br>
<form action="<?php echo URL; ?>post/create" method="post">

    <div class="form-group">
        <label>Título</label>
        <input type="text" name="title">
    </div>
    <hr>
    <div class="form-group">
        <textarea name="body" cols="50" rows="10"></textarea>
    </div>
    

    <input type="submit" value="Publicar">


<br>

<h1>Comentários</h1>
<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Crie um comentário</h5>
    <div class="card-body">
        <form>
            <div class="form-group">
                <textarea class="form-control" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
    </div>
</div>

</form>