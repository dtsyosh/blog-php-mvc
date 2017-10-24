<h1>Lista com todas as publicações</h1>

<?php

foreach($this->posts as $post) {
    # <!-- Title -->
    echo '<h1 class="mt-4"><a href='. URL .'post/show/'. $post['id'] .'>'. $post['title'] .'</a></h1>';


    # <!-- Author -->
    echo '<p class="lead">
        by
        <a href="#">Start Bootstrap</a>
        </p>';

    echo '<hr>';

    # <!-- Date/Time -->
    echo '<p>Posted on January 1, 2017 at 12:00 PM</p>';
    
    echo '<hr>';
    echo $post['body'];


}