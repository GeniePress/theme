<template>
  <div>
    <form @submit.prevent="submit()">
      <div v-if="formSubmitted">
        <p>Your message has been sent successfully. We will be in touch soon</p>
      </div>
      <div v-else>
        <div class="">
          <label>Name</label>
          <input type="text" v-model="name" required/>
        </div>

        <div class="">
          <label>Email</label>
          <input type="email" v-model="email" required/>
        </div>

        <div class="">
          <label>Your message</label>
          <textarea v-model="message" rows="4" required/>
        </div>
        <button type="submit">Send message</button>
      </div>
    </form>
  </div>
</template>

<script>

import axios from 'axios';

export default {

  props: {
    endpoint: {
      type: String,
      required: true
    },
  },


  data() {
    return {
      formSubmitted: false,
      name: '',
      email: '',
      message: '',
      loading: false,
    }
  },

  computed: {
    disabled() {
      return this.loading;
    }
  },

  methods: {

    submit() {

      if (this.loading) {
        return;
      }
      this.loading = true;

      axios.post(this.endpoint, {
        name: this.name,
        email: this.email,
        message: this.message
      }).catch((resp) => {
        // Show an error
      }).then((resp) => {
        this.formSubmitted = true;
        this.loading = false
        this.name = '';
        this.email = '';
        this.message = '';
      });
    }
  },

}
</script>
