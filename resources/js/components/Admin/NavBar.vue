<template>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">書籍管理後台</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <router-link :class="['nav-link']" active-class="active" to="/admin/dashboard"><i class="fas fa-fw fa-folder"></i>後台首頁</router-link>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <router-link :class="['nav-link']" active-class="active" to="/admin/books"><i class="fas fa-fw fa-book"></i>書籍管理</router-link>
        </li>
        <li class="nav-item">
            <router-link :class="['nav-link']" active-class="active" to="/admin/categories"><i class="fas fa-fw fa-file-contract"></i>分類管理</router-link>
        </li>
        <li class="nav-item">
            <router-link :class="['nav-link']" active-class="active" to="/admin/users"><i class="fas fa-fw fa-folder"></i>使用者管理</router-link>
        </li>
    </ul>
    <!-- End of Sidebar -->
</template>

<script>
export default {
    name: "NavBar",
    data(){
        return {
            isLogin: false,
            userInfo: {},
        }
    },
    created(){
        this.isLogin = this.$store.state.isLogin;
        this.userInfo = this.$store.state.userInfo;
    },
    methods:{
        logout(){
            this.$store.dispatch('userLogout');
            this.$router.push('/');
        }
    }
}
</script>

<style scoped>

</style>
