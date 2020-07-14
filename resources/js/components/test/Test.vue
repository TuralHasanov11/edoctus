<template>
    <div>
        <form @submit.prevent="onSubmit">
            <div v-for="(question, index) in questions" :key="index" class="col col-lg-9 my-2">
                <div class="card border-primary">
                    <div class="card-body">
                      <h5 class="card-title forn-weight-bold">{{index+1}}. {{question.title}}</h5>
                        <template v-if="question.type=='s'">
                            <label>0-5 arası dəyərləndirin</label>
                            <input type="range" class="custom-range" 
                                v-model="answers[index]"
                                min="0" step="0.2" max="1">
                            <input type="text" class="form-control"  :value="answers[index]*5?answers[index]*5:answers[index]" disabled>
                        </template>
                    
                        <template v-else-if="question.type=='b'">
                            <div class="form-check">
                                <input type="radio" value="1" name="answer" v-model="answers[index]" :id="'radio-yes-'+question.id"> 
                                <label :for="'radio-yes-'+question.id">Bəli</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" value="0" name="answer" v-model="answers[index]" :id="'radio-no-'+question.id"> 
                                <label :for="'radio-no-'+question.id">Xeyr</label>
                            </div>
                        </template>
                    
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Təsdiqlə</button>
        </form>
    </div>
</template>

<script>
export default {
    props:['questions','testid'],
    data(){
        return {
            answers:Array(this.questions.length).fill('Dəyər yoxdur'),
        }
    },
    methods:{
        onSubmit(){
            console.log(this.answers);
            axios.post('/api/v1/tests/calculate',{answers:this.answers, testId:this.testid})
                .then((res)=>{
                    console.log(res.data);
                })
                .catch((err)=>{
                    console.log(err);
                });
        }
    }
}
</script>