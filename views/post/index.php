<h1>Lista com todas as Publicações</h1>

<?php

foreach($this->posts as $post) {
    #var_dump($post);
    # <!-- Title -->
    echo '<h1 class="mt-4"><a href='. URL .'post/show/'. $post['id'] .'>'. $post['title'] .'</a></h1>';

    # <!-- Author -->
    echo '<p class="lead">
        by
        '. $post['user']['name'] .'
        </p>';

    echo '<hr>';

    # <!-- Date/Time -->
    echo '<p>Posted on January 1, 2017 at 12:00 PM</p>';
    
    echo '<hr>';
    echo '<p class="post-body">'. $post['body'] .'</p>';

}



    

    

    
  


       