<template>
    <div class="container">
        <div>
            <button @click="addNewbook" class="btn btn-primary">新增書本</button>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ISBN編號</th>
                <th scope="col">分類</th>
                <th scope="col">出版社</th>
                <th scope="col">作者</th>
                <th scope="col">書名</th>
                <th scope="col">集數</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Book in Books" :key="Book.id">
                <th scope="row">{{Book.id}}</th>
                <td>{{Book.books_ISBN}}</td>
                <td>{{Book.books_category}}</td>
                <td>{{Book.books_publisher}}</td>
                <td>{{Book.books_author}}</td>
                <td>{{Book.books_name}}</td>
                <td>{{Book.set_no}}</td>
                <td>
                    <button class="btn btn-primary">修改</button>
                    <button @click="deleteBooks(Book.id)" class="btn btn-danger">刪除</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            Books: [],
        }
    },
    created() {
        this.axios
            .get('http://php.mybooksvue.laravel.pri/api/books')
            .then(response => {
                this.Books = response.data;
            });
    },
    methods:
        {
            deleteBooks(id) {
                this.axios
                    .delete('http://php.mybooksvue.laravel.pri/api/books/${id}')
                    .then(response => {
                        let i = this.Books.map(item => item.id).indexOf(id);
                        this.Books.splice(i, 1)
                    });
            },
            addNewbook() {
                window.location.href = '/books/new';
            }
        }
}
</script>

<style scoped>

</style>
