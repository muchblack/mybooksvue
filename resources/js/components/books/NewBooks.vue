<template>
    <div>
        <h3>新增書籍</h3>
    </div>
    <div class="form-group">
        <label for="books_ISBN">ISBN13碼編號</label>
        <input type="text" class="form-control" v-model="Books.books_ISBN">
    </div>
    <div class="form-group">
        <label for="books_ISBN13">ISBN13碼編號</label>
        <input type="text" class="form-control" id="books_ISBN13" name="books_ISBN13">
    </div>
    <div class="form-group">
        <label for="books_category">書本分類</label>
        <select name="books_category" id="books_category"></select>
    </div>
    <div class="form-group">
        <label for="books_author">書本作者</label>
        <input type="text" class="form-control" id="books_author" name="books_author">
    </div>
    <div class="form-group">
        <label for="books_publisher">書本出版社</label>
        <select name="books_publisher" id="books_publisher"></select>
    </div>
    <div class="form-group">
        <label for="books_name">書本名稱</label>
        <input type="text" class="form-control" id="books_name" name="books_name">
    </div>
    <div class="form-group">
        <label for="books_sub_title">書本副標</label>
        <input type="text" class="form-control" id="books_sub_title" name="books_sub_title">
    </div>
    <div class="form-group">
        <label for="books_desc">書本簡介</label>
        <input type="text" class="form-control" id="books_desc" name="books_desc">
    </div>
    <div class="form-group">
        <label for="books_ver">書本出版版本號</label>
        <input type="text" class="form-control" id="books_ver" name="books_ver">
    </div>
    <div class="form-group">
        <label for="books_var_date">書籍出版日</label>
        <input type="text" class="form-control" id="books_var_date" name="books_var_date">
    </div>
    <div class="form-group">
        <label for="is_audit">是否為18+</label>
        <br/>
        <input type="radio" name="is_audit" id="is_audit_Y" value="Y">是
        <input type="radio" name="is_audit" id="is_audit_N" value="Y">否
    </div>
    <div class="form-group">
        <label for="is_set">是否為套裝書</label>
        <br/>
        <input type="radio" name="is_set" id="is_set_Y" value="Y">是
        <input type="radio" name="is_set" id="is_set_N" value="Y">否
    </div>
    <div class="form-group">
        <label for="set_no">集數</label>
        <input type="password" class="form-control" id="set_no" name="set_no">
    </div>
    <button class="btn btn-primary">送出</button>
</template>

<script>
export default {
    name: "NewBooks",
    data(){
        return {
            Category: [],
            Publishers: [],
            Books: {}
        }
    },
    created()
    {

    }
}
</script>

<style scoped>

</style>
