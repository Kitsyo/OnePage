import Cookies from 'js-cookie'
import store from "../store";

const AuthenticatedLayout = () => import('../layouts/Authenticated.vue')
const GuestLayout = ()  => import('../layouts/Guest.vue');

const PostsIndex  = ()  => import('../views/admin/posts/Index.vue');
const PostsCreate  = ()  => import('../views/admin/posts/Create.vue');
const PostsEdit  = ()  => import('../views/admin/posts/Edit.vue');
const ExercisesIndex  = ()  => import('../views/admin/exercises/Index.vue');
const ExercisesCreate  = ()  => import('../views/admin/exercises/Create.vue');
const ExercisesEdit  = ()  => import('../views/admin/exercises/Edit.vue');

const TasksList  = ()  => import('../views/admin/tasks/Index.vue');
const TasksCreate  = ()  => import('../views/admin/tasks/create.vue');
const TasksUpdate  = ()  => import('../views/admin/tasks/update.vue');

const wikipediasList  = ()  => import('../views/admin/wikipedias/index.vue');
const wikipediasCreate  = ()  => import('../views/admin/wikipedias/create.vue');
const wikipediasUpdate  = ()  => import('../views/admin/wikipedias/update.vue');

const Productos  = ()  => import('../views/admin/tienda/Index.vue');

function requireLogin(to, from, next) {
    let isLogin = false;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next()
    } else {
        next('/login')
    }
}

function guest(to, from, next) {
    let isLogin;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next('/')
    } else {
        next()
    }
}

export default [
    {
        path: '/',
        // redirect: { name: 'login' },
        component: GuestLayout,
        children: [

            {
                path: '/',
                name: 'home',
                component: () => import('../views/home/index.vue'), //hemos cambiado esta ruta por la de home
            },
            {
                path: 'posts',
                name: 'public-posts.index',
                component: () => import('../views/posts/index.vue'),
            },
            {
                path: 'posts/:id',
                name: 'public-posts.details',
                component: () => import('../views/posts/details.vue'),
            },
            {
                path: 'category/:id',
                name: 'category-posts.index',
                component: () => import('../views/category/posts.vue'),
            },
            {
                path: 'wikipedia',
                name: 'public-wikipedias.index',
                component: () => import('../views/wikipedias/index.vue'),
            },
            {
                path: 'wikipedia/:id',
                name: 'public-wikipedias.details',
                component: () => import('../views/wikipedias/details.vue'),
            },
            {
                path: 'categoria/:id',
                name: 'categoria-posts.index',
                component: () => import('../views/categoria/wikipedias.vue'),
            },
            {
                path: 'producto',
                name: 'public-productos.index',
                component: () => import('../views/productos/index.vue'),
            },
            {
                path: 'producto/:id',
                name: 'public-productos.details',
                component: () => import('../views/productos/details.vue'),
            },
            {
                path: 'categoria/:id',
                name: 'categoria-productos.index',
                component: () => import('../views/categoria/productos.vue'),
            },
            {
                path: 'login',
                name: 'auth.login',
                component: () => import('../views/login/Login.vue'),
                beforeEnter: guest,
            },
            {
                path: 'register',
                name: 'auth.register',
                component: () => import('../views/register/index.vue'),
                beforeEnter: guest,
            },
            {
                path: 'forgot-password',
                name: 'auth.forgot-password',
                component: () => import('../views/auth/passwords/Email.vue'),
                beforeEnter: guest,
            },
            {
                path: 'reset-password/:token',
                name: 'auth.reset-password',
                component: () => import('../views/auth/passwords/Reset.vue'),
                beforeEnter: guest,
            },
        ]
    },
    {
        path: '/admin',
        component: AuthenticatedLayout,
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireLogin,
        meta: { breadCrumb: 'Perfil' },
        children: [
            {
                name: 'admin.index',
                path: '',
                component: () => import('../views/admin/index.vue'), //hemos cambiado esta ruta por la de admin
                meta: { breadCrumb: 'Admin' }
            },
            {
                name: 'profile.index',
                path: 'profile',
                component: () => import('../views/admin/profile/index.vue'),
                meta: { breadCrumb: 'Profile' }
            },
            {
                name: 'posts.index',
                path: 'posts',
                component: PostsIndex,
                meta: { breadCrumb: 'Posts' }
            },
            {
                name: 'posts.create',
                path: 'posts/create',
                component: PostsCreate,
                meta: { breadCrumb: 'Add new post' }
            },
            {
                name: 'posts.edit',
                path: 'posts/edit/:id',
                component: PostsEdit,
                meta: { breadCrumb: 'Edit post' }
            },
            {
                name: 'producto',
                path: 'producto',
                meta: { breadCrumb: 'Producto'},
                children: [
                    {
                        name: 'producto.index',
                        path: '',
                        component: Productos,
                        meta: { breadCrumb: 'Productos' }
                    }
                ]
            },
            {
                name: 'tasks',
                path: 'tasks',
                meta: { breadCrumb: 'Tareas'},
                children: [
                    {
                        name: 'tasks.index',
                        path: '',
                        component: TasksList,
                        meta: { breadCrumb: 'Listado tareas' }
                    },
                    {
                        name: 'tasks.create',
                        path: 'create',
                        component: TasksCreate,
                        meta: { breadCrumb: 'Crear tareas' }
                    },{
                        name: 'tasks.update',
                        path: 'update/:id',
                        component: TasksUpdate,
                        meta: { breadCrumb: 'Actualizar tareas',linked: false }, // Linked false es para deshabilitar la ruta de seguimiento en el encabezado

                    }
                ]
            },
            {

                name: 'wikipedias',
                path: 'wikipedias',
                meta: { breadCrumb: 'Wikipedia'},
                children: [
                    {
                        name: 'wikipedias.index',
                        path: '',
                        component: wikipediasList,
                        meta: { breadCrumb: 'Listado Wikipedia' }
                    },
                    {
                        name: 'wikipedias.create',
                        path: 'create',
                        component: wikipediasCreate,
                        meta: { breadCrumb: 'Nueva entrada' }
                    },{
                        name: 'wikipedias.update',
                        path: 'update/:id',
                        component: wikipediasUpdate,
                        meta: { breadCrumb: 'Actualizar Entrada',linked: false }, // Linked false es para deshabilitar la ruta de seguimiento en el encabezado

                    }
                ]
            },
            {
                name: 'exercises',
                path: 'exercises',
                meta: { breadCrumb: 'Exercises'},
                children: [
                    {
                        name: 'exercises.index',
                        path: '',
                        component: ExercisesIndex,
                        meta: { breadCrumb: 'View' }
                    },
                    {
                        name: 'exercises.create',
                        path: 'create',
                        component: ExercisesCreate,
                        meta: { breadCrumb: 'Add new exercise' ,
                        linked: false, }
                    },
                    {
                        name: 'exercises.edit',
                        path: 'edit/:id',
                        component: ExercisesEdit,
                        meta: {
                            breadCrumb: 'Edit exercise',
                            linked: false,
                        }
                    }
                ]
            },

            {
                name: 'categories',
                path: 'categories',
                meta: { breadCrumb: 'Categories'},
                children: [
                    {
                        name: 'categories.index',
                        path: '',
                        component: () => import('../views/admin/categories/Index.vue'),
                        meta: { breadCrumb: 'View category' }
                    },
                    {
                        name: 'categories.create',
                        path: 'create',
                        component: () => import('../views/admin/categories/Create.vue'),
                        meta: {
                            breadCrumb: 'Add new category' ,
                            linked: false,
                        }
                    },
                    {
                        name: 'categories.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/categories/Edit.vue'),
                        meta: {
                            breadCrumb: 'Edit category',
                            linked: false,
                        }
                    }
                ]
            },

            {
                name: 'permissions',
                path: 'permissions',
                meta: { breadCrumb: 'Permisos'},
                children: [
                    {
                        name: 'permissions.index',
                        path: '',
                        component: () => import('../views/admin/permissions/Index.vue'),
                        meta: { breadCrumb: 'Permissions' }
                    },
                    {
                        name: 'permissions.create',
                        path: 'create',
                        component: () => import('../views/admin/permissions/Create.vue'),
                        meta: {
                            breadCrumb: 'Create Permission',
                            linked: false,
                        }
                    },
                    {
                        name: 'permissions.edit',
                        path: 'edit/:id',
                        component: () => import('../views/admin/permissions/Edit.vue'),
                        meta: {
                            breadCrumb: 'Permission Edit',
                            linked: false,
                        }
                    }
                ]
            },

            //TODO Organizar rutas
            {
                name: 'roles.index',
                path: 'roles',
                component: () => import('../views/admin/roles/Index.vue'),
                meta: { breadCrumb: 'Roles' }
            },
            {
                name: 'roles.create',
                path: 'roles/create',
                component: () => import('../views/admin/roles/Create.vue'),
                meta: { breadCrumb: 'Create Role' }
            },
            {
                name: 'roles.edit',
                path: 'roles/edit/:id',
                component: () => import('../views/admin/roles/Edit.vue'),
                meta: { breadCrumb: 'Role Edit' }
            },
            {
                name: 'users.index',
                path: 'users',
                component: () => import('../views/admin/users/Index.vue'),
                meta: { breadCrumb: 'Users' }
            },
            {
                name: 'users.create',
                path: 'users/create',
                component: () => import('../views/admin/users/Create.vue'),
                meta: { breadCrumb: 'Add New' }
            },
            {
                name: 'users.edit',
                path: 'users/edit/:id',
                component: () => import('../views/admin/users/Edit.vue'),
                meta: { breadCrumb: 'User Edit' }
            },
        ]
    },
    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },
];
