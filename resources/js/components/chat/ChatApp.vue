<template>
    <div class="chat-app">
        <app-conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"></app-conversation>
        <app-contact-list :contacts="contacts" :contact="selectedContact" @selected="startConversationWith"></app-contact-list>
    </div>
</template>

<script>
import Conversation from './Conversation';
import ContactList from './ContactList';
    export default {
        props:{
            user:{
                type:Object,
                required:true
            },
        },
        data(){
            return {
                selectedContact:null,
                messages:[],
                contacts:[],
            }
        },
        components:{
            appConversation:Conversation,
            appContactList:ContactList,
        },
        mounted(){
            window.Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage',(e)=>{
                    this.handleIncoming(e.message);
                });

            axios.get('/contacts')
                .then((res)=>{
                    this.contacts=res.data;
                    // this.initContact();
                });
        },
        methods:{
            startConversationWith(contact){
                this.updateUnreadCount(contact, true);
                axios.get(`/conversation/${contact.id}`)
                    .then((res)=>{
                        this.messages=res.data;
                        this.selectedContact=contact;
                    });
            },
            saveNewMessage(message){
                this.messages.push(message);
            },
            
            handleIncoming(message){
                if(this.selectedContact && message.from == this.selectedContact.id){
                    this.messages.push(message);
                    
                    // this.saveNewMessage(message);  
                    // Mark as read during conversation 
                    axios.get(`/conversation/read/${this.selectedContact.id}`); 

                    return;                  
                }
                this.updateUnreadCount(message.from_contact,false);
                // alert(message.text);
            },

            updateUnreadCount(contact, reset){
                this.contacts = this.contacts.map((single)=>{
                    if(single.id != contact.id){
                        return single;
                    }
                    if(reset){
                        single.unread=0;
                    }
                    else{
                        single.unread += 1;
                    }

                    return single;
                })
            },
        }
    }
</script>

<style scoped>
    .chat-app{
        display:flex;
    }
</style>