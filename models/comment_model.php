<?php

class Comment_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Return all comments of a post
     *
     * @param integer $id
     * @return array
     */
    public function select($id) {

        $commentsDB = $this->database->select(
            'SELECT * from comments as c
            where c.post_id = '. $id);
        
        $comments = array();
        foreach ($commentsDB as $comment) {
            $c = new Comment_Model();
            $c->id = $comment['id'];
            $c->post_id = $comment['post_id'];
            $c->user_id = $comment['user_id'];
            $c->body = $comment['body'];

            array_push($comments, $c);
        }
        return $comments;
    }

    /**
     * Finds a post by id
     *
     * @param integer $id
     * @return post
     */

    public function create($data) {
        $this->database->insert('comments', array(
            'body' => $data['body'],
            'post_id' => $data['post_id'],
            'user_id' => $data['user_id'],
        ));
    }

    public function user($id) {

        $user = $this->database->select('SELECT * FROM users where users.id = '. $id)[0];

        return $user;
    }
}