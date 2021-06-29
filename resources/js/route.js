import Login from './components/Login';
import Nav from './components/Nav';

import Books from './components/books/Books';
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

export default {
    routes: [
        {
            path: '/books',
            components:
                {
                    default: Books,
                    Nav:Nav
                },
            name: 'Books',
            meta: {
                title: 'Books'
            },
        },
        {
            path: '/books/new',
            components:
                {
                    default: NewBooks,
                    Nav:Nav
                },
            meta: {
                title: 'NewBookAdd'
            }
        },
        {
            path: '/books/:id',
            components:
                {
                    default: EditBooks,
                    Nav:Nav
                },
            meta: {
                title: 'EditBooks'
            }
        },
        {
            path: '/categories',
            components:
                {
                    default: Categories,
                    Nav:Nav
                },
            name: 'category',
            meta: {
                title: 'Category'
            },
        },
        {
            path: '/categories/new',
            components:
                {
                    default: NewCategory,
                    Nav:Nav
                },
            name: 'NewCategory',
            meta: {
                title: 'NewCategory'
            },
            alias: '/categories',
        },
        {
            path: '/categories/:id',
            components:
                {
                    default: EditCategory,
                    Nav:Nav
                },
            name: 'EditCategory',
            meta: {
                title: 'EditCategory'
            },
        },
        {
            path: '/publishers',
            components:
                {
                    default: Publishers,
                    Nav:Nav
                },
            name: 'publishers',
            meta: {
                title: 'Category'
            },
        },
        {
            path: '/publishers/new',
            components:
                {
                    default: NewPublisher,
                    Nav:Nav
                },
            name: 'NewPublisher',
            meta: {
                title: 'NewPublisher'
            }
        },
        {
            path: '/publishers/:id',
            components:
                {
                    default: EditPublisher,
                    Nav:Nav
                },
            name: 'EditPublisher',
            meta: {
                title: 'EditPublisher'
            }
        },
        {
            path: '/mybooks',
            components:
                {
                    default: Mybooks,
                    Nav:Nav
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
                    Nav:Nav
                },
            name: 'Users',
            meta: {
                title: 'Users'
            },
        }

    ]
}
