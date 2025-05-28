<template>
  <div class="chat-box">
    <div class="messages">
      <div v-for="msg in messages" :key="msg.id">
        <strong>{{ msg.sender.name }}:</strong> {{ msg.message }}
      </div>
    </div>
    <input v-model="newMessage" @keyup.enter="sendMessage" placeholder="Tapez un message..." />
  </div>
</template>

<script>
export default {
  props: ['receiverId'],
  data() {
    return {
      messages: [],
      newMessage: '',
      userId: null,
    };
  },
  methods: {
    fetchMessages() {
      axios.get(`/api/messages/${this.receiverId}`).then(res => {
        this.messages = res.data;
      });
    },
    sendMessage() {
      if (!this.newMessage.trim()) return;
      axios.post('/api/messages/send', {
        receiver_id: this.receiverId,
        message: this.newMessage
      }).then(res => {
        this.messages.push(res.data);
        this.newMessage = '';
      });
    }
  },
  mounted() {
    axios.get('/api/user').then(res => {
      this.userId = res.data.id;

      Echo.private('chat.' + this.userId)
        .listen('MessageSent', (e) => {
          this.messages.push(e.message);
        });

      this.fetchMessages();
    });
  }
};
</script>

<style>
.chat-box {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 300px;
  background: white;
  border: 1px solid #ccc;
  padding: 10px;
  max-height: 400px;
  overflow-y: auto;
}
.messages {
  max-height: 300px;
  overflow-y: auto;
}
</style>
