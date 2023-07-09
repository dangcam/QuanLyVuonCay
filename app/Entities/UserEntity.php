<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    protected $user_id;
    protected $username;
    protected $password;
    protected $gender;
    protected $email;
    protected $phonenumber;
    protected $group_id;
    protected $user_status;
}
