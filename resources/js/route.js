import {createRouter, createWebHistory} from "vue-router";
import store from './store/user';

import Login from './pages/Login';
import NavBar from './components/NavBar';
import Topbar from "./components/Topbar";
import Dashboard from "./components/Dashboard";

import Books from './components/books/Books';
import BooksIndex from "./components/books/BooksIndex";
import NewBooks from "./components/books/NewBooks";
import EditBooks from "./components/books/EditBooks";

import Categories from "./components/category/Categories";
import NewCategory from "./components/category/NewCategory";
import EditCategory from "./components/category/EditCategory";

import Publishers from "./components/publisher/Publishers";
import NewPublisher from "./components/publisher/NewPublisher";
import EditPublisher from "./components/publisher/EditPublisher";

import Mybooks from './components/mybooks/Mybooks';
import Users from './components/users/Users';
import CateIndex from "./components/category/CateIndex";
import PublishIndex from "./components/publisher/PublishIndex";


const route_list = [
    {
        path:'/',
        components: {
            default: Login
        },
        name: 'index',
        meta: {
            title: 'index'
        }
    },
    {
        path: '/dashboard',
        components:
            {
                default: Dashboard,
                Topbar: Topbar,
                NavBar: NavBar
            }
    },
    {
        path: '/books',
        name: 'Books',
        components:
            {
                default: Books,
                Topbar: Topbar,
                NavBar: NavBar
            },
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
        path: '/categories',
        name: 'category',
        components:
            {
                default: Categories,
                Topbar: Topbar,
                NavBar: NavBar
            },
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
    {
        path: '/publishers',
        name: 'publishers',
        components:
            {
                default: Publishers,
                Topbar: Topbar,
                NavBar: NavBar
            },
        children:[
            {
                path: '',
                name: 'PublishIndex',
                component: PublishIndex
            },
            {
                path: 'new',
                name: 'NewPublisher',
                component: NewPublisher,
            },
            {
                path: ':id',
                name: 'EditPublisher',
                component: EditPublisher,
            }
        ]
    },
    {
        path: '/mybooks',
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
        path: '/users',
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
