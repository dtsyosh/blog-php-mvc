<?php

class Comment_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function selectAll() {
        return $this->database->select('SELECT * from comments');
    }

    /**
     * Finds a post by id
     *
     * @param integer $id
     * @return post
     */
    public function find($id) {

        // The result for select's method is an array, so I only took [0] position
        $comments = $this->database->select('SELECT * from comments where comments.id = '.$id)[0];

        // Returning $post because the command above returns a array
        return $comments;
    }


    public function create($data) {
        $this->database->insert('comments', array(

            'text' => $data['body'],
            'post_id' => 2,
            'user_id' => 2,
            
        ));
    }

    public function user($id) {

        $user = $this->database->select('SELECT * FROM users where users.id = '. $id)[0];

        return $user;
    }
}