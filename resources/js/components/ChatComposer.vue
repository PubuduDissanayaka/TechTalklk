<template>
    <div class="col-md-12">
            <div class="floating-div">
                <picker v-if="emoStatus" set="twitter" @select="onInput" emoji="point_up" title="Pick Your Emoji" />
            </div>
        <div class="input-group inputmsg">
            <br>
            <span>
                <button class="emojibtn btn btn-sm btn-info" v-on:click="toggleEmo">
                    <v-icon><i class="far fa-laugh"></i></v-icon>
                </button>
            </span>
            <input type="text" class="form-control form-control-sm" placeholder="Type your message..." v-on:keyup.enter="sendChat" v-model="chat">
            <span class="input-group-append">
                <input class="btn btn-success btn-sm" type="button" v-on:click="sendChat" value="Send">
            </span>
        </div>
    </div>


</template>

<script>
import { Picker } from 'emoji-mart-vue'
export default {
    props: ['chats' , 'userid' , 'friendid'],
    components:{
        Picker
    },

    data(){
        return{
            chat:'',
            emoStatus: false
        }
    },

    methods:{
        sendChat: function(e){
            if(this.chat != ''){
                var data = {
                    chat: this.chat,
                    friend_id: this.friendid,
                    user_id: this.userid
                }

                this.chat = '';

                axios.post('/chat/sendChat' , data).then((response)=>{
                    this.chats.push(data)
                })
            }
        },

        onInput:function(e){
            if(!e){
                return false;
            }
            if(!this.chat){
                this.chat=e.native;
            }
            else{
                this.chat = this.chat + e.native;

            }
        },

        toggleEmo: function(e){
            this.emoStatus = !this.emoStatus;
        }
    }
}
</script>

<style scoped>
    .input-group.inputmsg {
    width: 100%;
    padding: 2px;
    margin: 0px;
}

.floating-div {
    position: absolute;
    margin-bottom: auto;
    margin-top: -410px;
    padding: 0px;
}

button.emojibtn {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    border-radius: 100px 0px 0px 100px;
}
</style>
