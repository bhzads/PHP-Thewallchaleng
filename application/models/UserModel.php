<?php

class UserModel extends CI_Model {

    public $fullname;
    public $email;
    public $password;


    public function addUser($data)
    {
        $this->db->insert('users', $data);
    }

    public function hasUser($email)
    {
        $user = $this->db->query('select * from users where email = ?;', [$email]);
        return $user->num_rows() === 0 ? false : true;
    }

    public function isUserValid($password)
    {
        $email = $this->input->post('email');
        $user = $this->db->query('select * from users where email = ?;', [$email])->row_array();

        return $this->encryption->decrypt($user['password']) === $password;
    }

    public function getUserByEmail($email)
    {
        return $this->db->query('select * from users where email = ?;', [$email])->row_array();
    }


}