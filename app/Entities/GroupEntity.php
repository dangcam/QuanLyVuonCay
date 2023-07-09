<?php
namespace App\Entities;
use CodeIgniter\Entity\Entity;

class GroupEntity extends Entity{
    protected $group_id;
    protected $group_name;
    protected $group_parent;
    protected $group_status;
}