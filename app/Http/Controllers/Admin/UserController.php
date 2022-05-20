<?php

namespace App\Http\Controllers\Admin;

// Los use equivalen a los import de javascript, es una forma de traer
// otros archivos que contienen código a este archivo
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
use Debugbar;

// Podemos identificar que estamos ante un objeto por la palabra "class"
// el nombre objeto es "UserController", el nombre del objeto tiene que
// coincidir con el nombre del archivo.

// extends lo que está afirmando es que el objeto "UserController" está
// heredando todas las propiedades (variables) y métodos del objeto "Controller"
class UserController extends Controller
{
    // Un objeto puede tener propiedades o/y métodos. 

    // La siguiente es una propiedad del objeto, una propiedad es equivalente
    // a una variable. En este caso estamos declarando la propiedad $user la cual
    // podrá ser usada si escribimos $this->user, donde "this" significa el propio
    // objeto. Protected en este caso significa que esta propiedad sólo puede ser 
    // usada desde dentro de una función. 

    protected $user;

    /*
    Las siguientes líneas son métodos. Un método se identifica porque
    escribimos "public function". Public en este caso significa que esta función
    puede ser llamada por otro archivo para que se ejecute el código que hay dentro de 
    la función. 

    Cuando llamamos a un método antes de nada se ejecutara el método 
    __construct (constructor). El constructor se utiliza normalmente para
    dar un valor a las propiedades. 

    En este caso estamos construyendo el objeto del modelo User y asignándolo
    a la propiedad $this->user para poder tener disponible el modelo dentro de
    cada método. Existen tres formas de construir (instanciar) un objeto, instanciar un objeto
    significa que hacemos disponible su código para poder ser usado. 

    1ª Forma (clásica):

    $user = new User; 

    En esta forma estamos creando una variable que se llama user, y que tiene como valor el objeto User. Si vemos
    la palabra "new" significa que se está instanciando el objeto. 

    2ª Forma (inyección de dependencias, la más óptima):

    __construct(User $user)

    En esta forma lo que hacemos es poner entre los paréntesis de un método (en este ejemplo en el método __construct) el nombre
    del objeto y una variable que tendrá como valor el objeto ya instanciado. El nombre de la variable puede ser el que queramos, 
    pero normalmente solemos poner como nombre de la variable el mismo nombre del objeto. 

    3ª Forma (uso de métodos estáticos, la menos óptima)

    View::make('admin.pages.usuarios.index')

    En esta forma lo que hacemos es usar un método de un objeto sin necesidad de instanciarlo. En este caso estamos usando el método
    make del objeto View. 

    Finalmente, una vez instanciado un objeto (por ejemplo, el objeto User) podemos acceder a sus propiedades escribiendo:

    $cat = new Cat;

    $cat->name;

    En este caso estamos accediendo a la propiedad "name" del objeto "cat";

    Si queremos acceder al método de un objeto tenemos que escribir:

    $cat->miau();
    
    */

    public function __construct(User $user)
    {
        // $this->middleware('auth');
        
        $this->user = $user;
    }
    
    public function index()
    {

        /* 
            En este momento estamos usando el objeto View para crear una vista, a la cual le estamos pasando dos variables
            (user y users). La primera variable tiene como valor los campos de la tabla usuarios vacios, y la segunda variable
            tiene como valor todos los registros de la tabla usuarios. Para pedir todos los datos hemos escrito: $this->user->get();
        */

        $view = View::make('admin.pages.usuarios.index')
                ->with('user', $this->user)
                ->with('users', $this->user->get());

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

       $view = View::make('admin.users.index')
        ->with('user', $sthis->uer)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(UserRequest $request)
    {            
        
        if (request('password') !== null) {

            $user = $this->user->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password')),
                'active' => 1,
            ]);
            
        }else{

            $user = $this->user->updateOrCreate([
                'id' => request('id')],[
                'name' => request('name'),
                'email' => request('email'),
                'active' => 1,
            ]);
        }

        $view = View::make('admin.users.index')
        ->with('users', $this->user->where('active', 1)->get())
        ->with('user', $user)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'id' => $user->id,
        ]);
    }

    public function edit(User $user)
    {
        $view = View::make('admin.users.index')
        ->with('user', $user)
        ->with('users', $this->user->where('active', 1)->get());   
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(User $user){

    }

    public function destroy(User $user)
    {
        $user->active = 0;
        $user->save();

        $view = View::make('admin.users.index')
            ->with('user', $this->user)
            ->with('users', $this->user->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}