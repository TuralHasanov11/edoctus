<template>
    <div class="conversation">
        <!-- <h4>{{contact?contact.name:'Şəxsi seçin'}}</h4> -->
       
        <div v-if="contact" class="media p-2 border-bottom">
            <img v-if="contact.role=='d'" class="bd-placeholder-img mr-2 rounded-circle" width="56" height="56" :src="`/storage/images/doctors/${contact.profile_image}`">
            <img v-else :src="`/storage/images/users/${contact.profile_image?contact.profile_image:'user_default.png'}`" class="bd-placeholder-img mr-2 rounded-circle" width="56" height="56">
            <div class="contact media-body bg-white small lh-125">
              <div class="d-flex justify-content-between align-items-center">
                <strong class="text-gray-dark">{{contact.name}}</strong>
              </div>
              <span class="d-block">{{contact.email}}</span>
            </div>
        </div>
         <h4 v-else>Şəxsi seçin</h4>

        <app-messages-feed :contact="contact" :messages="messages"></app-messages-feed>
        <app-message-composer @send="sendMessage"></app-message-composer>
    </div>
</template>

<script>
import MessagesFeed from './MessagesFeed';
import MessageComposer from './MessageComposer';

export default {
    props:{ 
        contact:{
            type:Object,
            default:null
        },
        messages:{
            type:Array,
            default:[]
        }
    },

    components:{
        appMessagesFeed:MessagesFeed,
        appMessageComposer:MessageComposer
    },

    methods:{
        sendMessage(text){
            if(!this.contact){
                return;
            }
            axios.post('/conversation/send',{
                contact_id:this.contact.id,
                text:text
            })
            .then((res)=>{
                this.$emit('new', res.data);
            });
        }
    }
    
}
</script>

<style scoped>
    .conversation{
        flex:5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    h4{
        padding: 0.7rem;
        margin:0;
        border-bottom: 0.1rem dashed #eee;
    }
</style>