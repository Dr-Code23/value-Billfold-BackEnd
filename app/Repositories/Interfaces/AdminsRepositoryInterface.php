<?php

namespace App\Repositories\Interfaces;


interface AdminsRepositoryInterface{
    public function getadmin();
    public function getAdmins();
    public function createAdmins();
    public function storeAdmins($data);
    public function editAdmins($id);
    public function updateAdmins($data,$id);
    public function deleteAdmins($id);
    public function profile();
    public function editImage($data,$id);
    public function editprofile($data , $id);
    public function getnotifcation();
}
