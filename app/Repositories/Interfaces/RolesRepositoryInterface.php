<?php

namespace App\Repositories\Interfaces;


interface RolesRepositoryInterface{
    public function getadmin();
    public function allRoles();
    public function createRoles();
    public function storeRoles($data);
    public function editRoles($id);
    public function updateRoles($data,$id);
    public function deleteRoles($id);
    public function getnotifcation();
}
