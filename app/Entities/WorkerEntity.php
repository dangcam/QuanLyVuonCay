<?php
namespace App\Entities;
use CodeIgniter\Entity\Entity;

class WorkerEntity extends Entity{
    protected $worker_id;
    protected $worker_name;
    protected $worker_birthyear;
    protected $worker_year;
    protected $phone_number;
    protected $address;
}