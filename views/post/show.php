<h1 class="mt-4"><?php echo $this->post['title']; ?></h1>
<!-- Author -->
<p class="lead">
    by
    <a href="#"><?php echo $this->post['user']['name']; ?></a>
    </p>

<hr>

<!-- Date/Time -->
<p>Posted on January 1, 2017 at 12:00 PM</p>

<hr>
<p class="post-body"><?php echo $this->post['body']; ?></p>