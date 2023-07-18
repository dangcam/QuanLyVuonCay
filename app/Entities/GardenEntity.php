<?php
namespace App\Entities;
use CodeIgniter\Entity\Entity;

class GardenEntity extends Entity{
    protected $garden_id;
    protected $garden_year ;
    protected $garden_name;
    protected $acreage;
    protected $year_planting;
    protected $year_down;
    protected $year_up;
    protected $year_full;
    protected $type_tree;
    protected $type_garden;
}