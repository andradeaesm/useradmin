<h1>Passos</h1>
<h2>Criar model Role com migration</h2>
<p><i><b>php artisan make:model Role -m</b></i></p>
<p>Na migration adicionar o campo roleName</p>
<p><b><i>$table->string('roleName');</i></b></p>
<h2>Criar uma migration para relacionar User - Role</h2>
<p><b><i>php artisan make:migration create_role_user_table --create=role_user</i></b></p>
<p>na migration eliminar os campos id e timestamps criados automaticamente</br>
criar os campos role_id e user_id</br>
<b><i>$table->biginteger(‘role_id’)->unsigned();</br>
$table->biginteger(‘user_id’)->unsigned();</b></i></br>
criar as foreign-key</br>
<b><i>$table->foreign(‘role_id’)->references(‘id’)->on(‘roles’)->onCascade(‘delete’);</br>
$table->foreign(‘user_id’)->references(‘id’)->on(‘users’)->onCascade(‘delete’);</b></i></p>
<h2>No model User criar a função roles</h2>
<p><b><i>public function roles()</br>
{</br>
return $this->belongsToMany(‘App\Role’);</br>
}</i></b></p>
<h2>No model Role criar a função users</h2>
<p><b><i>public function users()</br>
{</br>
return $this->belongsToMany(‘App\User’);</br>
}</i></b></p>
<h2>Criar um novo midleware para o admin</h2
    <p><b><i>php artisan make:middleware CheckAdmin</i></b></br>
Em app - http - middleware entrar em CheckAdmin</br>
adicionar o use Auth;</br>
Reconstruir a função handle existente</br>
antes do return</br>
<b><i>$userRoles = Auth::User()->roles->pluck(‘roleName’);</br>
if ( ! $userRoles->contains(‘admin’)){</br>
return redirect(‘\home’);</br>
}</i></b></p>
<h2>nas routes adinionar novo route group midleware para admin a envelver a route \admin</h2>
<h2>Abrir o kernel.php em app - http</h2>
<p>em protected $routeMiddleware adicionar no final do array</br>
<b><i>‘admin’ => \App\Http\Middleware\CheckAdmin::class,</i></b></p>

