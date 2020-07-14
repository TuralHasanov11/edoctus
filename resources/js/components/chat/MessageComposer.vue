<template>
    <div class="composer">
        <!-- <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea> -->
        <div class="input-group p-1">
          <!-- <div class="input-group-prepend">
            <span class="input-group-text" id="validatedInputGroupPrepend">@</span>
          </div> -->
            <textarea v-model="message" class="form-control" rows="1" @keydown.enter="send" placeholder="Mesaj..."></textarea>
          <!-- <input type="text" class="form-control is-invalid" v-model="message" @keydown.enter="send" placeholder="Message..."> -->
          <div class="input-group-append">
               <button class="btn btn-outline-primary" @click="send" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    data(){
        return {
            message:'',
        };
    },
    methods:{
        send(e){
            e.preventDefault();
            if(this.message==''){
                return;
            }

            this.$emit('send', this.message);
            this.message='';
        }
    }
}
</script>

<style scoped>
     /* .composer textarea{
         width:96%;
         margin:0.7rem;
         resize: none;
         border-radius: 0.2rem;
         border:0.1rem solid #ccc;
         padding: 0.4rem;
     } */
</style>