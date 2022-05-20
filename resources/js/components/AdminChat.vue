// resources/js/components/AdminChat.vue

<template>
    <div id="chat">
        <button class="btn btn-primary c-chat-widget-button" ref="button" @click.prevent="toggleModal()">C</button>
        <div class="c-chat-widget" ref="modal" :class="{show: modal.show}">
            <div class="c-chat-widget-dialog">
                <div class="c-chat-widget-content">
                    <div class="c-chat-widget-header">Chat With Us Admin</div>
                    <div class="c-chat-widget-body">
                        <div class="c-chat-widget-bubble c-chat-widget-bubble-left row" v-for="msg in messageData">
                            <div class="c-chat-widget-bubble-icon">{{msg.name.id}}</div>
                            <div class="c-chat-widget-bubble-text">
                                {{msg.text}}
                            </div>
                        </div>
                    </div>
                    <div class="c-chat-widget-footer">
                        <form @submit.prevent="sendmessage">
                            <textarea name="" id="" cols="30" v-model="message" rows="10" class="c-chat-widget-text" placeholder="Enter Text Here"></textarea>
                            <button class="btn btn-block btn-success">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                modal: {
                    show: false,
                },
                message: '',
                messageData: []
            }
        },
        mounted() {
        },
        methods: {
            toggleModal() {
                this.modal.show = !this.modal.show;
            },
            showModal() {
                this.modal.show = true;
            },
            hideModal() {
                this.modal.show = false;
            },
        }
</script>
