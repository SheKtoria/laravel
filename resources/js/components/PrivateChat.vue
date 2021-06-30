<template>

    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <textarea class='form-control' rows="10" readonly="">{{messages.join('\n')}}</textarea>
                <hr>
                <input type="text" class="form-control" v-model="textMessage" @keyup.enter="sendMessage(getUserName())">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['room'],
    data () {
        return {
            messages: [],
            textMessage: ''
        }
    },
    mounted () {
        window.Echo.private('room.' + this.room.id)
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data.body);
            })
    },
    methods: {
        sendMessage (userName) {
            if (this.textMessage.length >= 1) {
                console.log(userName)
                axios.post('/messages', { body: this.textMessage, room_id: this.room.id });
                this.messages.push(userName + ': ' + this.textMessage);
            }
            this.textMessage = '';
        },
        getUserName () {
            return document.getElementById('navbarDropdown').innerText;
        }
    }
}
</script>
