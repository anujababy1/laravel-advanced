<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepositoryInterface;
class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository){
        
        $this->customerRepository = $customerRepository;
    }

    public function index(){

        $customers = $this->customerRepository->all();
        dd($customers);
    }

    public function store(){

        $customers = $this->customerRepository->store(request()->all());
    }

    public function view($customer){

        $customers = $this->customerRepository->find($customer);
        dd($customers);
    }

    public function update($customer){

        $customerData = $this->customerRepository->find($customer); 
        $customers = $this->customerRepository->update($customerData,request()->all());
    }

    public function destroy($cusromer){

        $customers = $this->customerRepository->destroy($cusromer);
    }
}
