<?php
namespace App\Entities;
use CodeIgniter\Entity\Entity;

class TreeLineEntity extends Entity{
    protected $line_id;
    protected $garden_id;
    protected $line_year;
    protected $tree_live;
    protected $tree_dead;
    protected $hole_empty;
}