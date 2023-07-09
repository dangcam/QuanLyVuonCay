<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserFunctionEntity extends Entity
{
    protected $user_id;
    protected $function_id;
    protected $function_view;
    protected $function_add;
    protected $function_edit;
    protected $function_delete;
}
