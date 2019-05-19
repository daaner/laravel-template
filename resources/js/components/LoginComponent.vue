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
        {{ __('site.header.register') }}
      </h3>

      <form ref="form" :model="form">
        <label>{{ __('site.form.name') }}</label>
        <input type="text" v-model="form.name.value">
        <div class="input__error" v-if="form.name.errors" v-for="error in form.name.errors">{{error}}</div>

        <!-- <label>{{ __('site.form.login') }}</label>
        <input type="text" v-model="form.login.value">
        <div class="input__error" v-if="form.login.errors" v-for="error in form.login.errors">{{error}}</div> -->

        <label>{{ __('site.form.email') }}</label>
        <input type="text" v-model="form.email.value">
        <div class="input__error" v-if="form.email.errors" v-for="error in form.email.errors">{{error}}</div>

        <label>{{ __('site.form.password') }}</label>
        <input type="text" v-model="form.password.value">
        <div class="input__error" v-if="form.password.errors" v-for="error in form.password.errors">{{error}}</div>

        <label>{{ __('site.form.password_confirmation') }}</label>
        <input type="text" v-model="form.password_confirmation.value">
        <br>

        <a class="btn btn-primary" @click="onSubmit">{{ __('site.form.register') }}</a>
      </form>
    </div>

  </modal>
</template>

<script>
import cookies from 'js-cookie';

export default {
  name: 'LoginComponent',
  // props: ['value'],

  // created() {
  // },

  // mounted() {
  //   console.log('LoginComponent')
  // },

  data(){
    return {
      form: {
        name: {value:'', errors: []},
        login: {value:'', errors: []},
        email: {value:'', errors: []},
        password: {value:'', errors: []},
        password_confirmation: {value:'', errors: []},
      },

    }
  },

  methods: {
    beforeClose (event) {
      this.clearForm();
      // if (0) {
      //   event.stop()
      // }
    },

    onSubmit() {
      const [
        name,
        login,
        email,
        password,
        password_confirmation
      ] = [
        this.form.name.value,
        this.form.login.value,
        this.form.email.value,
        this.form.password.value,
        this.form.password_confirmation.value
      ];

      this.axios.post('/api/register',{
        name,
        // login,
        email,
        password,
        password_confirmation
      }).then(res=>{
        if (res) {
          this.clearForm();
          this.$modal.hide('login');
          console.log('user created');
          // this.setErrors(this.form,res.data.error);
          // cookies.set('apiToken', res.data.api_token);
          // setTimeout(()=>{
          //   window.location.replace('/');
          // }, 500)
        } else {
          console.log('Errors data');
          window.location.replace('/');
        }
      }).catch(error => {
        if (error.response) {
          console.log(error.response.data.errors);
          this.setErrors(this.form,error.response.data.errors);
        }
      });

    },

    clearForm() {
      var self = this;
      Object.keys(this.form).forEach(function(key,index) {
        self.form[key].value = '';
        self.form[key].errors = [];
      });
    },

    setErrors(data,errorList) {
      Object.keys(data).forEach(key=>{
      data[key].errors = errorList[key] ? (Array.isArray(errorList[key]) ? errorList[key] : [errorList[key]]) : [];
      })
    },

  },

  // computed:{
  // },

}
</script>
