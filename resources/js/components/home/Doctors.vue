<template>
    <section class="doctor_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Təcrübəli Həkimlərimiz</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div v-for="(doctor, index) in doctors" :key="index"  
                    class="col-sm-6 col-lg-4">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img :src="`/storage/images/doctors/${doctor.profile_image}`" alt="doctor">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3>{{doctor.name}}</h3>
                                <!-- <p>Heart specialist</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data(){
        return {
            doctors:[],
        }
    },

    created(){
        axios.get('/api/v1/user/doctors')
            .then((res)=>{
                this.doctors=res.data;
            });
    }
}
</script>