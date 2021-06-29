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
        <input type="text" class="form-control" v-model="Books.books_ISBN13">
    </div>
    <div class="form-group">
        <label for="books_category">書本主分類</label>
        <select v-model="Books.main_category">
            <option> 請選擇 </option>
            <option v-for="MainCategory in MainCategories" v-bind:value="MainCategory.id">
                {{ MainCategory.book_category_name }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="books_category">書本次分類</label>
        <select v-model="Books.sub_category">

        </select>
    </div>
    <div class="form-group">
        <label for="books_author">書本作者</label>
        <input type="text" class="form-control"  v-model="Books.books_author">
    </div>
    <div class="form-group">
        <label for="books_publisher">書本出版社</label>
        <select  v-model="Books.publisher">
            <option>請選擇</option>
            <option v-for="Publisher in Publishers" v-bind:value="Publisher.id">
                {{ Publisher.publisher_name }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="books_name">書本名稱</label>
        <input type="text" class="form-control" v-model="Books.books_name">
    </div>
    <div class="form-group">
        <label for="books_sub_title">書本副標</label>
        <input type="text" class="form-control"  v-model="Books.books_sub_title">
    </div>
    <div class="form-group">
        <label for="books_desc">書本簡介</label>
        <textarea  v-model="Books.books_desc"></textarea>
    </div>
    <div class="form-group">
        <label for="books_ver">書本出版版本號</label>
        <input type="text" class="form-control"  v-model="Books.books_ver">
    </div>
    <div class="form-group">
        <label for="books_var_date">書籍出版日</label>
        <input type="text" class="form-control"  v-model="Books.books_var_date">
    </div>
    <div class="form-group">
        <label for="is_audit">是否為18+</label>
        <br/>
        <input type="radio"  v-model="Books.is_audit" value="Y">是
        <input type="radio"  v-model="Books.is_audit" value="N">否
    </div>
    <div class="form-group">
        <label for="is_set">是否為套裝書</label>
        <br/>
        <input type="radio"  v-model="Books.is_set" value="Y">是
        <input type="radio"  v-model="Books.is_set" value="N">否
    </div>
    <div class="form-group">
        <label for="set_no">集數</label>
        <input type="password" class="form-control"  v-model="Books.set_no" >
    </div>
    <button class="btn btn-primary">送出</button>
</template>

<script>
export default {
    name: "EditBooks"
}
</script>

<style scoped>

</style>
