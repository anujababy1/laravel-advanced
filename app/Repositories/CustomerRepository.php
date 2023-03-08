<?php
namespace App\Repositories;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface {

    public function all(){
        return Customer::orderBy('name', 'asc')->get();
    }

    public function store($data){
        Customer::create($data);
    }

    public function find($customerId){
        return Customer::find($customerId);
    }

    public function update($customer,$data){

        $customer->update($data);
    }

    public function destroy($customerId){

        Customer::where('id',$customerId)->delete();
    }
}