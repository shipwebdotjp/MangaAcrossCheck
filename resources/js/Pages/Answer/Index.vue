<template>
    <div>
        <h1>
            答え
        </h1>
        <textarea v-if="message" v-model="message"></textarea>
        <button v-on:click="submitAnswer" class="b-1 p-2 m-1 ">送信</button>
    </div>
</template>


<script>
    //import AppLayout from '../../Layouts/AppLayout'

    export default {
        props:{
            message: {
                type: String,
            }
        },
        methods: {
            submitAnswer(){
                this.$inertia.post('/answers/store',{
                    "questionnaire_id": 769,
                    "answers": [
                        {
                        "question_id": 9298,
                        "answer_results": [
                            {
                            "id": null,
                            "answer": "test",
                            "is_text": true
                            }
                        ]
                        },
                        {
                        "question_id": 9299,
                        "answer_results": [
                            {
                            "id": 45874,
                            "answer": null,
                            "is_text": false
                            }
                        ]
                        }
                    ]
                });
            }
        }
    }

</script>