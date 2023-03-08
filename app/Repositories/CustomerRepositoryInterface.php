<?php
namespace App\Repositories;
interface CustomerRepositoryInterface {

    public function all();

    public function find($customerId);

    public function store($data);

    public function update($customerId,$data);
     
    public function destroy($customerId);

}