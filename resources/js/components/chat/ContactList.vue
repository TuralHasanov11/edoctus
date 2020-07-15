<template>
    <div class="contact-list">
        <ul v-if="contacts.length>0">
            <li v-for="(contact,index) in sortedContacts" :key="index" 
                @click="selectContact(contact)"
                :class="{'selected':contact==selected}"
                class='m-1 rounded'

            >

                <div class="media border bg-white p-2 text-muted .contact">
                    <img v-if="contact.role=='d'" src='https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.bluecrossnc.com%2Fmanage-your-plan&psig=AOvVaw2iYe9Il0BLFCmDG7AwJjCZ&ust=1594889453853000&source=images&cd=vfe&ved=0CAIQjRxqGAoTCIDc-cTwzuoCFQAAAAAdAAAAABCIAQ' width="3em" height="3em" class="mr-3 rounded-circle" alt="...">
                     <template v-else class="text-primary">
                        <svg width="3em" height="3em" style="color:#3490dc;" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg>
                    </template>
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