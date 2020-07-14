<template>
    <div>
        <div class="comment-form">
            <h4>
                Şərh bildir
                <div class="text-info"><small><em>Şərh yazmaq üçün əvvəlcə <a href="/register">qeydiyyatdan</a> keçməli yaxud mövcud <a href="/login">hesabınıza</a> daxil olmalısanız</em></small></div>
            </h4>
            
            <form @submit.prevent="onSubmit" class="form-contact comment_form" id="commentForm">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                            placeholder="Şərhiniz" v-model="comment"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Şərh bildir</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            comment:null,
        }
    },

    methods:{
        onSubmit(){
            this.$emit('composeComment', this.comment);
            this.comment=null;
        }
    },

}
</script>