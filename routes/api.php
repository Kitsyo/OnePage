<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ExerciseController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\api\TaskController; // Task controller import
use App\Http\Controllers\api\WikipediaController; // Task controller import
use App\Http\Controllers\api\NoticiaController; // Noticia controller import
use App\Http\Controllers\api\ProductoController; // Producto controller import
use App\Http\Controllers\api\PedidoController; //Pedido controller import
use App\Http\Controllers\api\CapituloController;
use App\Http\Controllers\api\MangaController;
use App\Http\Controllers\api\ProgresoUsuarioController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

Route::post('forget-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forget.password.post');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset');
Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks/', [TaskController::class, 'store']);
Route::put('tasks/update/{id}', [TaskController::class, 'update']);
Route::delete('tasks/{id}', [TaskController::class, 'destroy']);
Route::get('tasks/{id}', [TaskController::class, 'edit']);

// WIKI
Route::get('wiki', [WikipediaController::class, 'index']);
Route::post('wiki/', [WikipediaController::class, 'store']);
Route::put('wiki/update/{id}', [WikipediaController::class, 'update']);
Route::delete('wiki/{id}', [WikipediaController::class, 'destroy']);
Route::get('wiki/{id}', [WikipediaController::class, 'edit']);

// NOTICIAS
Route::get('noticias', [NoticiaController::class, 'index']);
Route::post('noticias/', [NoticiaController::class, 'store']);
Route::put('noticias/update/{id}', [NoticiaController::class, 'update']);
Route::delete('noticias/{id}', [NoticiaController::class, 'destroy']);
Route::get('noticias/{id}', [NoticiaController::class, 'edit']);

// PRODUCTOS
Route::get('productos', [ProductoController::class, 'index']); // Producto
Route::post('productos/', [ProductoController::class, 'store']); // Producto insertar
Route::delete('productos/{id}', [ProductoController::class, 'destroy']); // Producto eliminar
Route::put('productos/update/{id}', [ProductoController::class, 'update']);
Route::get('productos/{id}', [ProductoController::class, 'edit']);

Route::get('get-productos', [ProductoController::class, 'getproductos']);
Route::get('get-categoria-productos/{id}', [ProductoController::class, 'getCategoriaByProducto']);
Route::get('get-producto/{id}', [ProductoController::class, 'getproducto']);


//  PEDIDOS
Route::get('pedidos', [PedidoController::class, 'index']);
Route::post('pedidos/', [PedidoController::class, 'store']);
Route::put('pedidos/update/{id}', [PedidoController::class, 'update']);
Route::delete('pedidos/{id}', [PedidoController::class, 'destroy']);
Route::get('pedidos/{id}', [PedidoController::class, 'edit']);

//CATEGORIAS
Route::get('categoria-list', [CategoriaController::class, 'getList']);

//CATEGORIAS_WIKI
Route::get('get-wikipedias', [WikipediaController::class, 'getWikipedias']);
Route::get('get-categoria-posts/{id}', [WikipediaController::class, 'getCategoriaByWiki']);
Route::get('get-wikipedia/{id}', [WikipediaController::class, 'getWikipedia']);

//CAPITULOS
Route::get('/capitulos', [CapituloController::class, 'index']);
Route::get('/capitulos/{id}', [CapituloController::class, 'show']);

Route::get('get-categoria-capitulos/{id}', [CapituloController::class, 'getCategoriaByCaptulo']);

//MANGAS
Route::get('/mangas', [MangaController::class, 'index']);
Route::get('/mangas/{id}', [MangaController::class, 'show']);

//PROGRESO_USUARIOS
Route::get('/progreso-usuario/{user_id}', [ProgresoUsuarioController::class, 'index']);
Route::post('/progreso-usuario', [ProgresoUsuarioController::class, 'store']);
Route::put('/progreso-usuario/{id}', [ProgresoUsuarioController::class, 'update']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('users', UserController::class);
    Route::apiResource('posts', PostController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('roles', RoleController::class);
    //Route::apiResource('exercises', ExerciseController::class);
    Route::post('exercises/', [ExerciseController::class,'store']); //Guardar
    Route::get('exercises', [ExerciseController::class,'index']); //Listar
    Route::get('exercises/{exercise}', [ExerciseController::class,'show']); //Mostrar
    Route::post('exercises/update/{id}', [ExerciseController::class,'update']); //Editar

    Route::get('role-list', [RoleController::class, 'getList']);
    Route::get('role-permissions/{id}', [PermissionController::class, 'getRolePermissions']);
    Route::put('/role-permissions', [PermissionController::class, 'updateRolePermissions']);
    Route::apiResource('permissions', PermissionController::class);
    Route::get('category-list', [CategoryController::class, 'getList']);
    Route::get('/user', [ProfileController::class, 'user']);
    Route::put('/user', [ProfileController::class, 'update']);

    Route::get('abilities', function(Request $request) {
        return $request->user()->roles()->with('permissions')
            ->get()
            ->pluck('permissions')
            ->flatten()
            ->pluck('name')
            ->unique()
            ->values()
            ->toArray();
    });
});


Route::get('category-list', [CategoryController::class, 'getList']);
Route::get('get-posts', [PostController::class, 'getPosts']);
Route::get('get-category-posts/{id}', [PostController::class, 'getCategoryByPosts']);
Route::get('get-post/{id}', [PostController::class, 'getPost']);