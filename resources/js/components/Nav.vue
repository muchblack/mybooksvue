<template>
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <router-link :class="['nav-link']" active-class="active" to="/books">書籍管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :class="['nav-link']" active-class="active" to="/categories">分類管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :class="['nav-link']" active-class="active" to="/publishers">出版社管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :class="['nav-link']" active-class="active" to="/users">使用者管理</router-link>
            </li>
            <li class="nav-item">
                <router-link :class="['nav-link']" active-class="active" to="/mybooks">我的書櫃</router-link>
            </li>
        </ul>

    <!--            <router-link to="/categories" custom v-slot="{ href, route, navigate, isActive, isExactActive }">-->
    <!--                <li :class="['nav-item',isActive && 'active']" >-->
    <!--                    <a :href="href" @click="navigate">分類管理</a>-->
    <!--                </li>-->
    <!--            </router-link>-->

</template>

<script>
export default {
    name: "nav"
}
</script>

<style scoped>

</style>
