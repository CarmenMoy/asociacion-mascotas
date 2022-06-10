<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\Admin\CustomerRequest;


class CustomerController extends Controller
{

    protected $customer;

    public function __construct(Customer $customer)
    {      
        $this->customer = $customer;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.customers.index')
                ->with('customer', $this->customer)
                ->with('customers', $this->customer->where('active', 1)->get());

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    public function create()
    {

       $view = View::make('admin.pages.customers.index')
        ->with('customer', $this->customer)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(CustomerRequest $request)
    {            

        $customer = $this->customer->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'lastname' => request('lastname'),
            'telephone' => request('telephone'),
            'email' => request('email'),
            'direction' => request('direction'),
            'country' => request('country'),
            'city' => request('city'),
            'cp' => request('cp'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        $view = View::make('admin.pages.customers.index')
        ->with('customers', $this->customer->where('active', 1)->get())
        ->with('customer', $this->customer)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }

    public function edit(Customer $customer)
    {
        $view = View::make('admin.pages.customers.index')
        ->with('customer', $customer)
        ->with('customers', $this->customer->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Customer $customer){

    }

    public function destroy(Customer $customer)
    {
        $customer->active = 0;
        $customer->save();

        $view = View::make('admin.pages.customers.index')
            ->with('customer', $this->customer)
            ->with('customers', $this->customer->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}