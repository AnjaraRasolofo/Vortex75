import { createApp } from 'vue';
//import ChatBox from './components/ChatBox.vue';
import ChatLauncher from './components/ChatLauncher.vue';

const app = createApp({});
app.component('chat-launcher', ChatLauncher);
app.mount('#chat-launcher'); // ou `#app` selon ton wrapper HTML
