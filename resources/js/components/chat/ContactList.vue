<template>
    <div class="contact-list">
        <ul v-if="contacts.length>0">
            <li v-for="(contact,index) in sortedContacts" :key="index" 
                @click="selectContact(contact)"
                :class="{'selected':contact==selected}"
                class='m-1 rounded'

            >

                <div class="media border bg-white p-2 text-muted .contact">
                    <img v-if="contact.role=='d'" :src="`/storage/images/doctors/${contact.profile_image?contact.profile_image:'default_user.jpg'}`" width="56" height="56" class="mr-3 rounded-circle" alt="...">
                    <img v-else :src="`/storage/images/users/${contact.profile_image?contact.profile_image:'user_default.png'}`" width="56" height="56" class="mr-3 rounded-circle" alt="...">
                    <div class="media-body">
                      <h6 class="mt-0">
                            <strong style="word-wrap:break-word" class="text-gray-dark">{{contact.name}}</strong>
                            <span style="word-wrap:break-word" class="d-block"><small>{{contact.email}}</small></span>
                      </h6>
                     <a href="javascript:void(0)" v-if="contact.unread" class="unread badge badge-primary bg-primary">{{contact.unread}}</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        contacts:{
            type:Array,
            default:[]
        },
    },
    data(){
        return {
            selected:this.contacts.length?this.contacts[0]:null
        }
    },
    methods:{
        selectContact(contact){
            this.selected=contact;
            this.$emit('selected', contact)
        }
    },

    computed:{
        sortedContacts(){
            return _.sortBy(this.contacts, [(contact)=>{
                if(contact == this.selected){
                    return Infinity;
                }
                
                return contact.unread;
            }]).reverse();
        }
    }
}
</script>

<style scoped>
    .contact-list{
        flex:2;
        min-height:300px;
        max-height: 600px;
        overflow: scroll;
        border-left:0.1rem solid #ddd;
        background: #eee;
        word-wrap:break-word;
    }

    ul{
        list-style-type: none;
        padding-left:0;
        word-wrap:break-word;
    }

    ul li {
        position: relative;
        cursor: pointer;
    }

    ul li.selected {
        background: #eee;
    }

    li .contact h6{
        word-wrap:break-word;
    }

    .unread{
        position:absolute;
        right:0.5em;
        top:0.5em;
    }
</style>