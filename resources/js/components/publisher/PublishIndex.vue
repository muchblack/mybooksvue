<template>
    <div class="container">
        <div>
            <button class="btn btn-primary" @click="addNewPublishers">新增出版社</button>
        </div>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">出版社名稱</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="Publisher in Publishers" :key="Publisher.id">
                <th scope="row">{{ Publisher.id }}</th>
                <td>{{ Publisher.publisher_name }}</td>
                <td>
                    <button class="btn btn-primary" @click="EditPublishers(Publisher.id)">修改</button>
                    <!--                        <button @click="deleteBooks(Book.id)" class="btn btn-danger">刪除</button>-->
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
export default {
    name: "Publishers",
    data() {
        return {
            Publishers: [],
        }
    },
    created() {
        this.axios
            .get('/api/publisher')
            .then(response => {
                this.Publishers = response.data;
            });
    },
    methods: {
        addNewPublishers() {
            this.$router.push({
                name:'NewPublisher'
            });
        },
        EditPublishers(id)
        {
            this.$router.push({
                name: 'EditPublisher',
                params: {
                    id: id
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
