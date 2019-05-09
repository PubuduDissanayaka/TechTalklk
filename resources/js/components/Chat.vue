<style scoped>
.leftmsg{
    float: left;
    background-color: #037cf4;
    padding: 10px;
    border-radius: 100px;
    margin: 5px;
    font-size: 15px;
    font-family: inherit;
    border-top-left-radius: 0px;
    font-stretch: inherit;
    color: whitesmoke;
    max-width: 70%;
}

    .rightmsg {
        float: right;
        background-color: #633ab7e8;
        padding: 10px;
        border-radius: 20px;
        margin: 5px;
        font-size: 15px;
        font-family: inherit;
        color: whitesmoke;
        font-stretch: inherit;
        border-bottom-right-radius: 0px;
        max-width: 70%;
    }

    .chatbox {
        max-width: 100%;
        overflow-x: hidden;
        height: 400px;
        padding: 20px;
        overflow: auto;
    }


#style-7::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#style-7::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-7::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
									   left bottom,
									   left top,
									   color-stop(0.44, rgb(122,153,217)),
									   color-stop(0.72, rgb(73,125,189)),
									   color-stop(0.86, rgb(28,58,148)));
}
</style>


<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" >
                <div class="chatbox box" id="style-7" v-if="chats.length != 0" v-chat-scroll="{always: false, smooth: true, scrollonremoved:true}">
                    <div v-for="chat in chats">
                        <div class="clearfix" v-if="chat.user_id == userid">
                            <div class="rightmsg clearfix">
                                <!-- {{chat.friend.name}} -->
                                {{chat.chat}}
                            </div>
                        </div>

                        <div class="clearfix" v-else>
                            <div class="leftmsg clearfix">
                                {{chat.chat}}
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="no-message">
                    There are no Messages
                </div>
                <br>
                <chat-composer v-bind:userid="userid" v-bind:chats="chats" v-bind:friendid="friendid"></chat-composer>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['chats' , 'userid', 'friendid'],
    }
</script>


