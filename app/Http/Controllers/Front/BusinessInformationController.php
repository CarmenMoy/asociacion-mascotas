<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\BusinessInformation;
use App\Http\Requests\Front\BusinessInformationRequest;

class BusinessInformationController extends Controller
{

    protected $businessInformation;

    public function __construct(BusinessInformation $businessInformation)
    {      
        $this->businessInformation = $businessInformation;
    }
    
    public function index()
    {   

        $view = View::make('front.pages.contacto.index');

        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

    public function show(BusinessInformation $businessInformation){

    }
}