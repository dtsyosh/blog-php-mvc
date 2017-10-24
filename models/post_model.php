<?php

class Post_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {
        return $this->database->select('SELECT * from posts');
    }

    public function find($id) {

        // The result for select's method is an array, so I only took [0] position
        $post = $this->database->select('SELECT * from posts where posts.id = '.$id)[0];

        // Returning $post because the command above returns a array
        return $post;
    }

    public function create($data) {
        $this->database->insert('posts', array(
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => 1,
            'active' => true
        ));
    }

    public function user($id) {

        $user = $this->database->select('SELECT * FROM users where users.id = '. $id)[0];

        return $user;
    }
}