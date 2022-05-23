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
                ->with('users', $this->user->where('active', 1)->get());

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
        /*
            En la siguientes líneas estamos creando una variable que se llama view, y que tiene como valor el objeto View.
            El objeto View medienta un método estático está creando la vista 'admin.pages.usuarios.create' que es la que se
            mostrará en pantalla. Con 'with' le estamos diciendo que le pase la variable 'user' y que su valor sea el objeto
            modelo User, que como no estamos haciendo ninguna llamada a la base de datos nos devolverá los campos vacíos de la tabla.
            Por último, renderSections() lo que está haciendo es recargar las sections que tiene la vista (en este caso 'form' y 'table')
            con los datos procesados. 
        */

       $view = View::make('admin.pages.usuarios.index')
        ->with('user', $this->user)
        ->renderSections();

        /*
            En la siguiente línea estamos devolviendo una respuesta a la petición AJAX, una petición AJAX hará que una parte de la página
            se actualice sin necesidad de recargar toda la página. En este caso, la parte que se actualizará es la parte del formulario. Para
            ello estamos diciendo que la palabra "form" será equivalente a $view['form'], la cual contiene el html del formulario ya actualizado.
        */

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(UserRequest $request)
    {            
        /*
            Lo primero que hemos hecho es por inyección de dependencias pasarle el validador a los datos capturados. 

            Podemos capturar el valor de un input mediante request, por ejemplo, si queremos capturar el valor de un input
            que tenía como atributo name="password" podemos hacerlo escribiendo: request('password');

            A continuación, en este caso, vamos comprobar si el input con el name password tiene un valor. Si 
        */

        if (request('password') !== null) {

            /*
                En la siguiente línea vamos a guardar los datos en la base de datos. Usaremos el método store tanto para
                guardar como para actualizar los datos, esto es gracias a un método de los modelos (en este caso el modelo User que 
                es $this->user) llamado updateOrCreate. Updateorcreate comprobará si el usuario existe en la base de datos, si existe
                actualizará los datos, si no existe creará un nuevo registro, esto lo hará mediante el campo id.  
            */

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

        $view = View::make('admin.pages.usuarios.index')
        ->with('users', $this->user->where('active', 1)->get())
        ->with('user', $this->user)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }

    public function edit(User $user)
    {
        $view = View::make('admin.pages.usuarios.index')
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

        $view = View::make('admin.pages.usuarios.index')
            ->with('user', $this->user)
            ->with('users', $this->user->where('active', 1)->get())
            ->renderSections();
        
        return response()->json([
            'table' => $view['table'],
            'form' => $view['form']
        ]);
    }
}