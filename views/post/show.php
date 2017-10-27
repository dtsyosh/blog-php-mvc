<h1 class="mt-4"><?php echo $this->post['title']; ?></h1>
<!-- Author -->
<p class="lead">
    by
    <a href="#"><?php echo $this->post['user']->name; ?></a>
    </p>

<hr>

<!-- Date/Time -->
<p>Posted on January 1, 2017 at 12:00 PM</p>

<hr>
<p class="post-body"><?php echo $this->post['body']; ?></p>

<br>
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

<br>



<!-- Author -->

<!-- Date/Time -->
