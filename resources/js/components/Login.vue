<template>
    <form>
        <div class="form-group">
            <label for="member_name">使用者帳號</label>
            <input type="text" class="form-control" id="member_name" aria-describedby="emailHelp" placeholder="請輸入帳號">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="member_pwd">使用者密碼</label>
            <input type="password" class="form-control" id="member_pwd" placeholder="請輸入密碼">
        </div>
        <button type="submit" class="btn btn-primary">登入</button>
    </form>
</template>

<script>
export default {
    name: "Login"
}
</script>

<style scoped>

</style>
