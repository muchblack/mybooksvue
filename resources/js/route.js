import Login from './components/Login';
import Books from './components/books/Books';
import Mybooks from './components/mybooks/Mybooks';
import Users from './components/users/Users';

export default {
    routes: [
        {
            path: '/login',
            component: Login,
            name: 'Login',
            meta: {
                title: 'Login'
            },
        },
        {
            path: '/books',
            component: Books,
            name: 'Books',
            meta: {
                title: 'Books'
            },
        },
        {
            path: '/mybooks',
            component: Mybooks,
            name: 'Mybooks',
            meta: {
                title: 'Mybooks'
            },
        },
        {
            path: '/users',
            component: Users,
            name: 'Users',
            meta: {
                title: 'Users'
            },
        }

    ]
}
