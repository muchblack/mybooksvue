<template>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">書籍管理後台登入</h1>
                                </div>
                                <form class="user" @submit.prevent="onSubmit">
                                    <Input type="text" placeholder="請輸入使用者帳號" v-model:value="username" :error="error.username" islogin="islogin"></Input>

                                    <Input type="password" placeholder="請輸入使用者密碼" v-model:value="password" :error="error.password" islogin="islogin"></Input>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">登入</button>

<!--                                    <hr>-->
<!--                                    <a href="index.html" class="btn btn-google btn-user btn-block">-->
<!--                                        <i class="fab fa-google fa-fw"></i> Login with Google-->
<!--                                    </a>-->
<!--                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">-->
<!--                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook-->
<!--                                    </a>-->
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">忘記密碼？</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">建個帳號吧！</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
import Input from "./Input";

export default {
    name: "Login",
    components: {Input},
    data() {
        return {
            username: "",
            password: "",
            error: {},
            isLogin: false,
        }
    },
    created() {
        //login頁面加上背景顏色
        document.body.className='bg-gradient-primary'
    },
    methods:
        {
           async onSubmit(){
                this.error = {};
                console.log(this.username)
                if(this.username === '') this.error.username = "必須填入使用者帳號";
                if(this.password === '') this.error.password = "必須填入使用者密碼";
                if(JSON.stringify(this.error) !== '{}' ) return;

                this.axios
                    .post('/api/login/',{ member_name: this.username, member_pwd: this.password})
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
