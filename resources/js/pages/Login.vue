<template>
    <form @submit.prevent="onSubmit()">
        <div class="form-group">
            <label for="exampleInputEmail1">使用者帳號</label>
            <input type="text" class="form-control" :class="{'is-invalid' : !! error.member_name}" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="member_name">
            <p :class="{'invalid-feedback' : !! error.member_name }" v-if=" !! error.member_name">{{ error.member_name}}</p>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">使用者密碼</label>
            <input type="password" :class="{'is-invalid' : !! error.member_pwd}" class="form-control" id="exampleInputPassword1" v-model="member_pwd">
            <p :class="{'invalid-feedback' : !! error.member_name }" v-if=" !! error.member_pwd">{{ error.member_pwd}}</p>
        </div>
        <button type="submit" class="btn btn-primary">登入</button>

    </form>
    <div class="form-group">
        {{ error.message }}
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            member_name: "",
            member_pwd: "",
            error: {},
            test: "",
            testUser : {},
            isLogin: false,
        }
    },
    created() {
    },
    methods:
        {
           async onSubmit(){
                this.error = {};
                if(this.member_name === '') this.error.member_name = "必須填入使用者帳號";
                if(this.member_pwd === '') this.error.member_pwd = "必須填入使用者密碼";
                if(JSON.stringify(this.error) !== '{}' ) return;

                this.axios
                    .post('/api/login/',{ member_name: this.member_name, member_pwd: this.member_pwd})
                    .then(response => {
                        this.$store.dispatch('setUserData', response.data);
                        this.testUser = this.$store.state.userInfo;
                        this.isLogin = this.$store.state.isLogin;
                        this.$router.push({name: 'Books'});
                    })
                    .catch(err =>{
                        console.log(err.response.data.Msg);
                        this.error.message = err.response.data.Msg;
                        console.log(this.error.message)
                    })
                    .finally(() => this.loading = false)
            }
        }
}
</script>

<style scoped>

</style>
