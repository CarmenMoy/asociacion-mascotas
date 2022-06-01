<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Http\Requests\Admin\CatRequest;


class CatController extends Controller
{
    protected $cat;

    public function __construct(Cat $cat)
    {       
        $this->cat = $cat;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.cats.index')
                ->with('cat', $this->cat)
                ->with('cats', $this->cat->where('active', 1)->get());

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

       $view = View::make('admin.pages.cats.index')
        ->with('cat', $this->cat)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(CatRequest $request)
    {            

        if (request('description') !== null) {


            $cat = $this->cat->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'sex' => request('sex'),
                'category' => request('category'),
                'years' => request('years'),
                'description' => request('description'),
                'vaccinated' => request('vaccinated'),
                'sterilized' => request('sterilized'),
                'active' => 1,
            ]);
            
        }else{

            $cat = $this->cat->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'sex' => request('sex'),
                'category' => request('category'),
                'years' => request('years'),
                'description' => request('description'),
                'vaccinated' => request('vaccinated'),
                'sterilized' => request('sterilized'),
                'active' => 1,
            ]);
        }

        $view = View::make('admin.pages.cats.index')
        ->with('cats', $this->cat->where('active', 1)->get())
        ->with('cat', $this->cat)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }

    public function edit(Cat $cat)
    {
        $view = View::make('admin.pages.cats.index')
        ->with('cat', $cat)
        ->with('cats', $this->cat->where('active', 1)->get());   

        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Cat $cat){

    }

    public function destroy(Cat $cat)
    {
        $cat->active = 0;
        $cat->save();

        $view = View::make('admin.pages.cats.index')
            ->with('cat', $this->cat)
            ->with('cats', $this->cat->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}