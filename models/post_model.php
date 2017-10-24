<?php

class Post_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {
        return $this->database->select('SELECT * from posts');
    }

    public function find($id) {
        return $this->database->select('SELECT * from posts where posts.id = '.$id)[0];
    }

    public function create($data) {
        $this->database->insert('posts', array(
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => 1,
            'active' => true
        ));

    }
}