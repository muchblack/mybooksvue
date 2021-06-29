<template>
    <div>
        <h3>修改分類</h3>
    </div>
    <form @submit.prevent="editCategory">
        <div class="form-group">
            <label for="book_category_id">分類編號</label>
            <input type="text" class="form-control" v-model="Category.book_category_id">
        </div>
        <div class="form-group">
            <label for="book_category_name">書本分類名稱</label>
            <input type="text" class="form-control" v-model="Category.book_category_name">
        </div>
        <div class="form-group">
            <label for="book_category_parent_id">書本上層分類</label>
            <br/>
            <template v-if="Category.book_category_parent_id == 0">
                <input type="checkbox" v-model="Category.parent_check" value="1" checked >此分類為母分類
            </template>
            <template v-else>
                <input type="checkbox" v-model="Category.parent_check" value="1">此分類為母分類
            </template>
            <br/>
            <select class="form-control" v-model="Category.book_category_parent_id">
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
    name: "EditCategory",
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
        this.axios
            .get(`/api/category/${this.$route.params.id}`)
            .then(response => {
                this.Category = response.data
            });
    },
    methods:
        {
            editCategory(){
                this.axios
                    .patch(`/api/category/${this.$route.params.id}`,this.Category)
                    .then(response => (
                        this.$router.push({
                            name:'category'
                        })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
}
</script>

<style scoped>

</style>
