<template>
    <div>
        <h3>修改書籍</h3>
    </div>
    <form @submit.prevent="editBook">
        <div class="form-group">
            <label for="books_ISBN">ISBN13碼編號</label>
            <input type="text" class="form-control" v-model="Books.books_ISBN" disabled>
        </div>
        <div class="form-group">
            <label for="books_name">書本名稱</label>
            <input type="text" class="form-control" v-model="Books.books_name">
        </div>
        <div class="form-group">
            <label for="books_name">原文名稱</label>
            <input type="text" class="form-control" v-model="Books.books_ori_name">
        </div>
        <div class="form-group">
            <label for="books_author">書本作者</label>
            <input type="text" class="form-control" v-model="Books.books_author">
        </div>
        <div class="form-group">
            <label for="books_category">書本主分類</label>
            <select v-model="Books.main_category">
                <option> 請選擇</option>
                <option v-for="MainCategory in MainCategories" v-bind:value="MainCategory.id">
                    {{ MainCategory.book_category_name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="books_category">書本次分類</label>
            <select v-model="Books.sub_category">
                <option v-for="SubCategory in SubCategories" v-bind:value="SubCategory.id">
                    {{ SubCategory.book_category_name }}
                </option>
            </select>
        </div>
        <div class="form-group">
            <label for="books_publisher">書本出版社</label>
            <input type="text" class="form-control" v-model="Books.books_publisher">
        </div>
        <div class="form-group">
            <label for="books_var_date">書籍出版日</label>
            <input type="text" class="form-control" v-model="Books.books_var_date">
        </div>
        <div class="form-group">
            <label for="is_audit">是否為18+</label>
            <br/>
            <input type="radio" v-model="Books.is_adult" value="Y">是
            <input type="radio" v-model="Books.is_adult" value="N">否
        </div>
        <div class="form-group">
            <label for="is_set">是否為套裝書</label>
            <br/>
            <input type="radio" v-model="Books.is_set" value="Y">是
            <input type="radio" v-model="Books.is_set" value="N">否
        </div>
        <div class="form-group">
            <label for="set_no">集數</label>
            <input type="text" class="form-control" v-model="Books.set_no">
        </div>
        <button class="btn btn-primary">送出</button>
        <button class="btn btn-primary">回上一頁</button>
    </form>
</template>

<script>
export default {
    name: "EditBooks",
    data() {
        return {
            MainCategories: [],
            SubCategories: [],
            Publishers: [],
            Books: {}
        }
    },
    created() {
        this.axios
            .get(`/api/books/${this.$route.params.id}`)
            .then(response => {
                this.Books = response.data
                console.log(this.Books.set_no)
            });
        this.axios
            .get('/api/category/parent/')
            .then(response => {
                this.MainCategories = response.data;
            });
    },
    watch: {
        "Books.main_category": function (value) {
            this.axios
                .get(`/api/category/parent/${value}`)
                .then(response => {
                    this.SubCategories = response.data;
                });
        }
    },
    methods: {
        editBook() {
            this.axios
                .patch(`/api/books/${this.$route.params.id}`,this.Books)
                .then(response => {
                    // console.log(response.data);
                    this.$router.push({
                        path: '/admin/books'
                    })
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>

<style scoped>

</style>
