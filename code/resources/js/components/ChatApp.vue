<template>
    <div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <ContactsList :contacts="contacts" @selected="startConversionWith"/>
    </div>
</template>

<script>

    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

    export default {

        props: {
            user: {
                type: Object,
                required: true
            }
        },

        data(){
            return {
                selectedContact: null,
                messages:[],
                contacts:[]
            }; 
        },

        mounted() {

            Echo.private('messages.'+this.user.id)
                .listen('NewMessage', (e) => {
                    this.handleIncoming(e.message);
                })

            axios.get('/contacts')
                .then((response) => {
                    console.log(response.data);
                    this.contacts = response.data;
                });
        },

        methods: {
            startConversionWith(contact){

                this.updateUnreadCount(contact, true);

                axios.get(`/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })

            },
            saveNewMessage(message){
                this.messages.id+=1;
                this.messages.push(message);

            },
            handleIncoming(message){

                if(this.selectedContact && message.asked_by == this.selectedContact.id){
                    this.saveNewMessage(message);
                    return;
                }

                this.updateUnreadCount(message.to_contact, false);
                console.log('hey');
                this.saveNewMessage(message);
                    return;

            },
            updateUnreadCount(contact, reset){
                this.contacts = this.contacts.map((single) => {

                    if(single.id != contact.id){
                        return single;
                    }

                    if(reset){
                        single.unread = 0;
                    }

                    else{
                        single.unread += 1;
                    }

                    return single;

                })
            }
        },  

        components: {Conversation, ContactsList}
    }
</script>
  


<style lang="scss" scoped>

.chat-app{
    display: flex;
}

</style>
