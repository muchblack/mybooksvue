<template>
    <div>
        <h3>修改出版社</h3>
    </div>
    <form @submit.prevent="editPublisher">
        <div class="form-group">
            <label for="book_category_id">出版社名稱</label>
            <input type="text" class="form-control" v-model="Publishers.publisher_name">
        </div>
        <button class="btn btn-primary" type="submit">送出</button>
    </form>
</template>

<script>
export default {
    name: "EditPublisher",
    data(){
        return {
            Publishers: {},
        }
    },
    created(){
        this.axios
            .get(`/api/publisher/${this.$route.params.id}`)
            .then(response => {
                this.Publishers = response.data
            });
    },
    methods:
        {
            editPublisher()
            {
                this.axios
                    .patch(`/api/publisher/${this.$route.params.id}`,this.Publishers)
                    .then(response => (
                        this.$router.push({
                            path: '/admin/publishers'
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
