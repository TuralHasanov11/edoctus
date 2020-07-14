<template>
    <div>
        <div v-for="(comment,index) in comments" :key="index" ref="comments" class="comment-list border-bottom mt-4">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <template v-if="comment.user.role=='d'">
                            <img style="width:3em;height:3em;" :src="`/storage/images/doctors/${comment.user.profile_image}`" alt="">
                        </template>
                        <template v-else class="text-primary">
                            <svg width="3em" height="3em" style="color:#3490dc;" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                            </svg>
                        </template>
                    </div>
                    <div class="desc">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <h5 class="text-primary">
                                    <a href="">{{comment.user.name}}</a>
                                    <span v-if="comment.user.role==='a'" class="badge badge-primary">Admin</span>
                                    <span v-if="comment.user.role==='d'" class="badge badge-primary">
                                        <span class="badge badge-pill badge-primary">
                                            Həkim
                                        </span>
                                        <span class="badge badge-pill badge-primary">
                                            {{comment.user.doctor_info.doctor_type.name}}
                                        </span>
                                    </span>
                                </h5>
                                <p class="date">{{comment.created_at|dateFilter}}</p>
                            </div>
                        </div>
                        <p class="comment">
                            {{comment.body}}
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        comments:{
            type:Array,
            default:[],
        }
    }
}
</script>