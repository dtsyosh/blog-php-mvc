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
</form>
