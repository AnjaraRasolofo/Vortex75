<template>
  <div>
    <button class="floating-button" @click="toggleChat">
      💬
    </button>

    <div v-if="showChat" class="chat-modal">
      <div class="chat-header">
        <span>Discuter avec l'admin</span>
        <button @click="toggleChat">✖</button>
      </div>
      <chat-box :receiver-id="receiverId" />
    </div>
  </div>
</template>

<script>
import ChatBox from './ChatBox.vue';

export default {
  components: { ChatBox },
  props: ['receiverId'],
  data() {
    return {
      showChat: false,
    };
  },
  methods: {
    toggleChat() {
      this.showChat = !this.showChat;
    }
  }
};
</script>

<style>
.floating-button {
  position: fixed;
  bottom: 25px;
  right: 25px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 50%;
  padding: 15px;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.chat-modal {
  position: fixed;
  bottom: 90px;
  right: 25px;
  width: 320px;
  max-height: 500px;
  background: white;
  border-radius: 8px;
  border: 1px solid #ccc;
  overflow: hidden;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  display: flex;
  flex-direction: column;
}

.chat-header {
  background: #007bff;
  color: white;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>
