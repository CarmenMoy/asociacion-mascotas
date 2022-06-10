<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;


class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {       
        $this->category = $category;
    }
    
    public function index()
    {

        $view = View::make('admin.pages.categories.index')
                ->with('category', $this->category)
                ->with('categories', $this->category->where('active', 1)->get());

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

       $view = View::make('admin.pages.categories.index')
        ->with('category', $this->category)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(CategoryRequest $request)
    {            

        $category = $this->category->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'description' => request('description'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);
      
        $view = View::make('admin.pages.categories.index')
        ->with('categories', $this->category->where('active', 1)->get())
        ->with('category', $this->category)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }

    public function edit(Category $category)
    {
        $view = View::make('admin.pages.categories.index')
        ->with('category', $category)
        ->with('categories', $this->category->where('active', 1)->get());   

        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Category $category){

    }

    public function destroy(Category $category)
    {
        $category->active = 0;
        $category->save();

        $view = View::make('admin.pages.categories.index')
            ->with('category', $this->category)
            ->with('categories', $this->category->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}