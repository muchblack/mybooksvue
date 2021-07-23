import {createRouter, createWebHistory} from "vue-router";
import store from './store/user';

import Adminlogin from './pages/Adminlogin';
import NavBar from './components/Admin/NavBar';
import Topbar from "./components/Admin/Topbar";
import AdminIndex from "./components/Admin/AdminIndex";
import Dashboard from "./components/Admin/Dashboard";

import Books from './components/Admin/books/Books';
import BooksIndex from "./components/Admin/books/BooksIndex";
import NewBooks from "./components/Admin/books/NewBooks";
import EditBooks from "./components/Admin/books/EditBooks";

import Categories from "./components/Admin/category/Categories";
import NewCategory from "./components/Admin/category/NewCategory";
import EditCategory from "./components/Admin/category/EditCategory";

import PublishIndex from "./components/Admin/publisher/PublishIndex";
import Publishers from "./components/Admin/publisher/Publishers";
import NewPublisher from "./components/Admin/publisher/NewPublisher";
import EditPublisher from "./components/Admin/publisher/EditPublisher";

import Mybooks from './components/Admin/mybooks/Mybooks';
import Users from './components/Admin/users/Users';
import CateIndex from "./components/Admin/category/CateIndex";



const route_list = [
    {
        path:'/admin/login',
        name:'Login',
        component: Adminlogin,
    },
    {
        path:'/admin',
        name: 'index',
        components: {
            default: AdminIndex,
            Topbar: Topbar,
            NavBar: NavBar
        },
        children:[
            {
                path: '',
                name: 'Dashboard',
                component: Dashboard,
            },
            {
                path: 'dashboard',
                name: 'Dashboard',
                component: Dashboard,
            },
            {
                path: 'books',
                name: 'Books',
                component: Books,
                children: [
                    {
                        path: '',
                        name: 'BookIndex',
                        component: BooksIndex
                    },
                    {
                        path: 'new',
                        name: 'NewBooks',
                        component: NewBooks
                    },
                    {
                        path: ':id',
                        name: 'EditBooks',
                        component: EditBooks
                    }
                ],
            },
            {
                path: 'categories',
                name: 'category',
                component: Categories,
                children:[
                    {
                        path: '',
                        name: 'CateIndex',
                        component: CateIndex
                    },
                    {
                        path: 'new',
                        name: 'NewCategory',
                        component: NewCategory
                    },
                    {
                        path: ':id',
                        name: 'EditCategory',
                        component: EditCategory,
                    }
                ]
            },
            // {
            //     path: 'publishers',
            //     name: 'publishers',
            //     component: Publishers,
            //     children:[
            //         {
            //             path: '',
            //             name: 'PublishIndex',
            //             component: PublishIndex
            //         },
            //         {
            //             path: 'new',
            //             name: 'NewPublisher',
            //             component: NewPublisher,
            //         },
            //         {
            //             path: ':id',
            //             name: 'EditPublisher',
            //             component: EditPublisher,
            //         }
            //     ]
            // },
            {
                path: 'mybooks',
                components:
                    {
                        default: Mybooks,
                        Topbar: Topbar,
                        NavBar: NavBar
                    },
                name: 'Mybooks',
                meta: {
                    title: 'Mybooks'
                },
            },
            {
                path: 'users',
                components:
                    {
                        default: Users,
                        Topbar: Topbar,
                        NavBar: NavBar
                    },
                name: 'Users',
                meta: {
                    title: 'Users'
                },
            },
        ]
    },
]

const router = createRouter({
        history: createWebHistory(),
        routes: route_list,
    }
)
router.beforeEach((to, from, next)=>{

    if(to.path != '/test')
    {
        if(!store.state.isLogin && to.path != '/')
        {
            next('/');
        }
    }
    next();
})

export default router
