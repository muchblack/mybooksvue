<template>
    <div class="container">
        <div>
            <button class="btn btn-primary" @click="addNewCategory">新增分類</button>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">分類編號</th>
                <th scope="col">書本分類名稱</th>
                <th scope="col">書本上層母分類</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Category in Categories" :key="Category.id">
                <th scope="row">{{Category.id}}</th>
                <td>{{Category.book_category_id}}</td>
                <td>{{Category.book_category_name}}</td>
                <td>{{Category.parent_name}}</td>
                <td>
                    <button class="btn btn-primary" @click="EditCategory(Category.id)">修改</button>
                    <!--                        <button @click="deleteBooks(Book.id)" class="btn btn-danger">刪除</button>-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
export default {
    name: "Categories",
    data() {
        return {
            Categories: []
        }
    },
    created() {
        this.axios
            .get('/api/category/')
            .then(response => {
                this.Categories = response.data;
            });
    },
    methods:
        {
            addNewCategory()
            {
                this.$router.push({
                    name:'NewCategory'
                });
            },
            EditCategory(id)
            {
                this.$router.push({
                    name:'EditCategory',
                    params:{
                        id:id
                    }
                });
            }
        }
}
</script>

<style scoped>

</style>
