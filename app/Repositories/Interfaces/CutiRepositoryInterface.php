<?php
namespace App\Repositories\Interfaces;

Interface CutiRepositoryInterface{
    
    public function allCuti();
    public function storeCuti($data);
    public function findCuti($id);
    public function updateCuti($data, $id); 
    public function destroyCuti($id);
}