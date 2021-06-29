<template>
    <div>
        <h3>新增出版社</h3>
    </div>
    <form @submit.prevent="addPublisher">
        <div class="form-group">
            <label for="book_category_id">出版社名稱</label>
            <input type="text" class="form-control" v-model="Publishers.publisher_name">
        </div>
        <button class="btn btn-primary" type="submit">送出</button>
    </form>
</template>

<script>
export default {
    name: "NewPublisher",
    data(){
        return {
            Publishers: {},
        }
    },
    methods:
        {
            addPublisher(){
                this.axios
                    .post('/api/publisher/',this.Publishers)
                    .then(response => (
                        this.$router.push({
                            name:'publishers'
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
