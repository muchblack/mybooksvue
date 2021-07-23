<template>
    <div>
        <h3>新增分類</h3>
    </div>
    <form @submit.prevent="addCategory">
        <div class="form-group">
            <label for="book_category_id">分類編號</label>
            <input type="text" class="form-control" v-model="Category.id">
        </div>
        <div class="form-group">
            <label for="book_category_name">書本分類名稱</label>
            <input type="text" class="form-control" v-model="Category.name">
        </div>
        <div class="form-group">
            <label for="book_category_parent_id">書本上層分類</label>
            <br/>
            <input type="checkbox" v-model="Category.parent_check" value="1">此分類為母分類
            <br/>
            <select class="form-control" v-model="Category.parent_id">
                <option>請選擇</option>
                <option v-for="Parent in Parents" v-bind:value="Parent.id">
                    {{ Parent.book_category_name }}
                </option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">送出</button>
    </form>
</template>

<script>
export default {
    name: "NewCategory",
    data() {
        return {
            Parents: [],
            Category: {},
        }
    },
    created() {
        this.axios
            .get('/api/category/parent/')
            .then(response => {
                this.Parents = response.data;
            });
    },
    methods:
        {
            addCategory(){
                this.axios
                    .post('/api/category/',this.Category)
                    .then(response => (
                        this.$router.push({path: '/admin/categories'})
                ))
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
            }
        }
}
</script>

<style scoped>

</style>
