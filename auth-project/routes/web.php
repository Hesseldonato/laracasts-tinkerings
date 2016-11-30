<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/begin', function () {
    flash('You are logged in.', 'success');
    return redirect('/');
});

Route::get('/factory-singleton-examples', function () {
    /**
     * Messy dependency injection example, of multiple dependencies having to be dealt with during instantiation
     */
    class UserRegistrar {
        protected $mailer;

        /**
         * Example of constructor injection
         * @param Mailer $mailer
         */
        public function __construct(Mailer $mailer)
        {
            $this->mailer = $mailer;
        }
    }
    class Mailer {
        protected $details = ['some', 'mailer', 'details'];
    }

    echo "<h3>See web.php routes source code for code examples for below var dumps:</h3>";

    echo "Example of messy dependency injection being dealt with to use above classes: ";
    $user_registrar = new UserRegistrar(new Mailer);
    var_dump($user_registrar); echo "<br><br>";

    echo "example of using a 'factory' instead, with Laravel's 'service container' to manage dependencies";
    App::bind('user_registrar', function(){
        return new UserRegistrar(new Mailer);
    });

    echo 'Create using above "factory"';
    $user_registrar = App::make('user_registrar');
    var_dump($user_registrar); echo "<br><br>";

    echo 'Or create it using singletons, such as a DB connection';
    App::bind('user_registrar_singleton', function(){
        return new UserRegistrar(new Mailer);
    });

    $user_registrar = App::singleton('user_registrar_singleton');
    var_dump($user_registrar); echo "<br><br>";

    echo 'Finally, if you type hint the function it is used in, Laravel automatically resolves it based on either App bindings, or auto class resolution: ';
    var_dump(function(UserRegistrar $user_registrar_type_hinted){
        return $user_registrar_type_hinted;
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
