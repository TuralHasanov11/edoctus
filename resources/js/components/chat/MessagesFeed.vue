<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="(message, index) in messages" :key="index"
                :class="`message${message.to === contact.id?' sent':' received'}`"
            >
                <div class="text">
                    {{message.text}}
                </div>
            </li>
        </ul>
        <div v-else class='container'>
            <div class="row justify-content-center align-items-center">
                <p class='my-3'>Söhbət üçün heç kim seçilməyib</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        contact:{
            required:true
        },
        messages:{
            type:Array,
            required:true
        }
    },
    methods:{
        scrollToBottom(){
            setTimeout(()=>{
                this.$refs.feed.scrollTop= this.$refs.feed.scrollHeight-this.$refs.feed.clientHeight;
            }, 50);
            
        }
    },
    watch:{
        contact(contact){
            this.scrollToBottom();
        },
        messages(){
            this.scrollToBottom();
        }
    }
}
</script>

<style scoped>
    .feed{
        background:rgb(248, 248, 248);
        height: 100%;
        max-height: 30rem;
        overflow: scroll;
    }
    .feed ul{
        list-style-type: none;
        padding: 3rem;
    }

    .feed ul li.message{
        margin: 0.7rem 0;
        width:100%;
    }

    .feed ul li.message .text{
        max-width: 15rem;
        border-radius: 0.3rem;
        padding: 0.8rem;
        display: inline-block;
    }


    .feed ul li.message.received{
       text-align:left;
    }
    .feed ul li.message.received .text{
       background: rgb(221, 221, 221);
    }

     .feed ul li.message.sent{
       text-align:right;
    }
    .feed ul li.message.sent .text{
        color:white;
        background: #3490dc;
    }
</style>