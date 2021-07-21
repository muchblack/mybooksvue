<template>
    <div class="form-group">
        <label v-if=" !! label">{{ label }}</label>
        <input
            :type="type"
            class="form-control"
            :class="{'is-invalid' : !! error, 'form-control-user':  islogin }"
            :value="value" @input="$emit('update:value',$event.target.value)"
            :placeholder="placeholder"
        >
        <p :class="{'invalid-feedback' : !! error }" v-if=" !! error">{{ error }}</p>
    </div>
</template>

<script>
export default {
    name: "Input",
    props:['label', 'type', 'value', 'error', 'placeholder', 'islogin' ]
}
</script>

<style scoped>

</style>
