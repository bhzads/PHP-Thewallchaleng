<?php

class PostModel extends CI_Model {

    public $text;
    public $userId;
    public $date;

    public function addPost($data)
    {
        $this->db->insert('posts', $data);
    }

    public function getAll()
    {
        $sql = 'SELECT posts.*, users.fullname as fullname FROM posts 
                LEFT JOIN users ON posts.user_id = users.id 
                ORDER BY posts.upvoet  DESC';

        return $this->db->query($sql)->result_array();
    }

    public function getPostById($id)
    {
        $sql = 'SELECT posts.*, users.fullname as fullname FROM posts 
                LEFT JOIN users ON posts.user_id = users.id 
                WHERE posts.id = ?';

        return $this->db->query($sql, [$id])->row_array();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM posts where posts.id=?;';

        return $this->db->query($sql, [$id]);
    }


    public function upvoet($id)
    {

        $sql = 'UPDATE posts set upvoet =upvoet + 1 where posts.id=?;';

        return $this->db->query($sql, [$id]);
    }
}