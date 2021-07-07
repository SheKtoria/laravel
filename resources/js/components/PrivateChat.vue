<template>
    <div class="container">
        <hr>
        <div class="chatFieldRoom">
            <textarea id='private-chat' class='form-control chatText' rows="10" readonly="readonly">{{messages.join('\n')}}</textarea>
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
            allData: []
        }
    },
    mounted () {
        window.Echo.private('room.' + this.room.id)
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data.body)
            })
        setTimeout(this.updateScroll, 500)
    },
    created () {
        this.allData = this.getAllMessages()
    },
    methods: {
        sendMessage (userName) {
            if (this.textMessage.length) {
                axios.post('/messages', {
                    body: (this.textMessage),
                    room_id: this.room.id
                })
                this.messages.push(userName + ': ' + this.textMessage)
            }
            this.textMessage = ''
            this.updateScroll()
        },
        getUserName () {
            return document.getElementById('navbarDropdown').innerText
        },
        getAllMessages () {
            axios.post('/allMessages', {
                room_id: this.room.id,
            }).then(data => {
                for (let i = 0; i < data.data.length; i++) {
                    this.messages.push(data.data[i].sender_id + ': ' + data.data[i].messages)

                }
            })
        },
        updateScroll (id = 'private-chat') {
            var div = document.getElementById(id)
            $('#' + id).animate({
                scrollTop: div.scrollHeight - div.clientHeight + 100
            }, 800)
        },

    }
}
</script>
