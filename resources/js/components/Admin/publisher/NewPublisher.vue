<template>
    <div>
        <h3>新增出版社</h3>
    </div>
    <form @submit.prevent="addPublisher">
        <Input type="text" label="出版社名稱" v-model:value="Publishers.publisher_name" :error="error.publisher_name"></Input>
        <button class="btn btn-primary" type="submit">送出</button>
    </form>
</template>

<script>
import Input from "../../pages/Input";
export default {
    name: "NewPublisher",
    components: {Input},
    data(){
        return {
            Publishers: {},
            error: {},
        }
    },
    methods:
        {
            async addPublisher(){
                this.error = {};
                if( ! this.Publishers.publisher_name) this.error.publisher_name = "必須填入出版社名稱";
                if( JSON.stringify(this.error) !== '{}' ) return;

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
