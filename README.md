<h1>Passos</h1>
<h2>Criar model Role com migration</h2>
<p>php artisan make:model Role -m</p>
<p>Na migration adicionar o campo roleName</p>
<h2>Criar uma migration para relacionar User - Role</h2>
<p>php artisan make:migration create_role_user_table --create=role_user</p>
<p>na migration eliminar os campos id e timestamps criados automaticamente</br>
criar os campos role_id e user_id</br>
$table->biginteger(‘role_id’)->unsigned();</br>
$table->biginteger(‘user_id’)->unsigned();</br>
criar as foreign-key</br>
$table->foreign(‘role_id’)->references(‘id’)->on(‘rules’)->onCascade(‘delete’);</br>
$table->foreign(‘user_id’)->references(‘id’)->on(‘users’)->onCascade(‘delete’);</p>
<h2>No model User criar a função roles</h2>
<p>public function roles()</br>
{</br>
return $this->belongsToMany(‘App\User’);</br>
}</p>
<h2>No model Role criar a função users</h2>
<p>public function users()</br>
{</br>
return $this->belongsToMany(‘App\Roler’);</br>
}</p>
<h2>Criar um novo midleware para o admin</h2
<p>php artisan make:middleware CheckAdmin</br>
Em app - http - middleware entrar em CheckAdmin</br>
adicionar o use Auth;</br>
Reconstruir a função handle existente</br>
antes do return</br>
$userRoles = Auth::User()->roles->pluck(‘nome’);</br>
if ( ! $userRoles->contains(‘admin’)){</br>
return redirect(‘\home’);</br>
}</p>
<h2>nas routes adinionar novo reout group midleware para admin a envelver a route \admin</h2>
<h2>Abrir o kernel.php em app - http</h2>
<p>em protected $routeMiddleware adicionar no final do array</br>
‘admin’ => \App\Http\Middleware\CheckAdmin::class,</p>

