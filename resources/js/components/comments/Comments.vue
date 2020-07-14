<template>
<div class="comments-area">
    <h4>{{comments.length?comments.length:0}} Şərh :</h4>

    <div v-if="commentFailed" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Şərhiniz yüklənmədi!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div v-if="commentSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Şərhiniz uğurla yükləndi!</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>


    <app-comment-composer @composeComment="sendComment"></app-comment-composer>
    <hr>

    <template v-if="comments">
        <app-comments-feed :comments="comments"></app-comments-feed>
    </template>

    <div v-else class="text-center"><h5><em>Şərh yoxdur</em></h5></div>
    
    
</div> 
</template>

<script>
import CommentComposer from './CommentComposer';
import CommentsFeed from './CommentsFeed';

export default {
    props:{
        post:{
            type:Number,
            default:null
        }
    },
    components:{
        appCommentComposer:CommentComposer,
        appCommentsFeed:CommentsFeed,
    },
    data(){
        return {
            comments:[],
            commentFailed:false,
            commentSuccess:false,
        }
    },
    mounted(){
         window.Echo.private(`posts.${this.post}.comments`)
                .listen('NewComment',(e)=>{
                    this.saveNewComment(e.comment);
                    // console.log(e.comment);   
                });

        axios.get(`/posts/${this.post}/comments`)
            .then((res)=>{
                if(res.status==200){
                    this.comments=res.data;
                }
            });
   },

   methods:{
        sendComment(comment){
            // console.log(comment);
           axios.post(`/posts/${this.post}/comments`, {body:comment})
                .then((res)=>{
                    if(res.status==200){
                        // console.log(res.data);
                        //  this.saveNewComment(res.data);
                        this.commentSuccess=true;
                    }
                })
                .catch((err)=>{
                    if(err.response.status==401){
                        window.location.assign('/login');
                    }
                    else{
                        this.commentFailed=true;
                    }
                });
        },
        // handleIncoming(comment){
        //     this.saveNewComment(comment);   
        // },
        saveNewComment(comment){
            this.comments.push(comment);
        }, 

   },

}
</script>