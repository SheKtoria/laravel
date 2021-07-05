<template>
    <div class="container">
        <hr>
        <div class="chatFieldRoom">
            <textarea class='form-control chatText' rows="10" readonly="readonly">{{messages.join('\n')}}</textarea>
            <hr>
            <input type="text" class="form-control sendText" v-model="textMessage" placeholder="Input your text here"
                   @keyup.enter="sendMessage(getUserName())">
        </div>
    </div>

</template>

<script>
export default {
    props: ['room'],
    data () {
        return {
            messages: [],
            textMessage: '',
        allData: ''
        }
    },
    mounted () {
        window.Echo.private('room.' + this.room.id)
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data.body)
            })
    },
    created () {
        if(this.room.messages !== null) {
            this.messages.push(this.room.messages);
        }
    },
    methods: {
        sendMessage (userName) {
            if (this.textMessage.length) {
                axios.post('/messages', {
                    body: (userName + ': ' + this.textMessage ),
                    room_id: this.room.id
                })
                this.messages.push(userName + ': ' + this.textMessage)
            }
            this.textMessage = ''
        },
        getUserName () {
            return document.getElementById('navbarDropdown').innerText
        },

    }
}
</script>
