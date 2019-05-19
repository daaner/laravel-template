<template>
  <modal
    name="login"
    transition="nice-modal-fade"
    height="auto"
    :adaptive="true"
    @before-close="beforeClose">

    <button class="close" aria-hidden="true" @click="$modal.hide('login')">&times;</button>

    <div class="login-component">
      <h3>
        login
      </h3>
    </div>

  </modal>
</template>

<script>
import cookies from 'js-cookie';

export default {
  name: 'LoginComponent',
  // props: ['value'],

  created() {
  },

  mounted() {
    console.log('LoginComponent')
  },

  data(){
    return {
      form: {
        name: '',
        login: '',
        password: '',
      }
    }
  },

  methods: {
    beforeClose (event) {
      console.log('2close');
      if (0) {
        event.stop()
      }
    }
  },

  computed:{
  },

}
</script>
