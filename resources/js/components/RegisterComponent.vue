<template>
  <modal
    name="register"
    transition="nice-modal-fade"
    height="auto"
    :adaptive="true"
    @before-close="beforeClose">

    <button class="close" aria-hidden="true" @click="$modal.hide('register')">&times;</button>

    <div class="login-component">
      <h3>
        {{ __('site.header.register') }}
      </h3>

      <transition name="fade">
        <div v-if="mainError" class="bg-warning strong text-center upper mt-5 mb-5 p-5 rounded">
          {{ mainError }}
        </div>
      </transition>

      <form ref="form" :model="form">
        <label>{{ __('site.form.name') }}</label>
        <input type="text" name="name" v-model="form.name.value">
        <div class="input__error" v-if="form.name.errors" v-for="error in form.name.errors">{{error}}</div>

        <label>{{ __('site.form.email') }}</label>
        <input type="text" name="email" v-model="form.email.value">
        <div class="input__error" v-if="form.email.errors" v-for="error in form.email.errors">{{error}}</div>

        <label>{{ __('site.form.password') }}</label>
        <input type="password" name="password" v-model="form.password.value">
        <div class="input__error" v-if="form.password.errors" v-for="error in form.password.errors">{{error}}</div>

        <label>{{ __('site.form.password_confirmation') }}</label>
        <input type="password" name="password_confirmation" v-model="form.password_confirmation.value">
        <br>

        <a class="btn btn-primary" @click="onSubmit">{{ __('site.form.register') }}</a>
      </form>
    </div>

  </modal>
</template>

<script>
import cookies from 'js-cookie';

export default {
  name: 'RegisterComponent',
  // props: ['value'],

  // created() {
  // },

  // mounted() {
  //   console.log('RegisterComponent')
  // },

  data(){
    return {
      mainError: '',

      form: {
        name: {value:'', errors: []},
        email: {value:'', errors: []},
        password: {value:'', errors: []},
        password_confirmation: {value:'', errors: []},
      },

    }
  },

  // computed:{
  // },

  methods: {
    beforeClose (event) {
      this.clearForm();
      // if (0) {
      //   event.stop()
      // }
    },

    clearForm() {
      this.clearError();
      var self = this;
      Object.keys(this.form).forEach(function(key,index) {
        self.form[key].value = '';
        self.form[key].errors = [];
      });
    },

    clearError() {
      this.mainError = '';
      var self = this;
      Object.keys(this.form).forEach(function(key,index) {
        self.form[key].errors = [];
      });
    },

    onSubmit() {
      this.clearError();

      const [
        name,
        email,
        password,
        password_confirmation
      ] = [
        this.form.name.value,
        this.form.email.value,
        this.form.password.value,
        this.form.password_confirmation.value
      ];

      this.axios.post('/api/register', {
        name,
        email,
        password,
        password_confirmation
      }).then(res=>{
        if (res) {
          cookies.set('apiToken', res.data.api_token);
          setTimeout(()=>{
            window.location.reload();
          }, 500);
        } else {
          window.location.replace('/');
        }
      }).catch(error => {
        if (error.response.data.errors) {
          this.setErrors(this.form, error.response.data.errors);
        } else if(error.response.data.error) {
          this.mainError = error.response.data.error;
        } else {
          this.mainError = this.__('api.errors.unknown');
          return false;
        }
      });
    },

    setErrors(data, errorList) {
      Object.keys(data).forEach(key=>{
      data[key].errors = errorList[key] ? (Array.isArray(errorList[key]) ? errorList[key] : [errorList[key]]) : [];
      })
    },
  },
}
</script>
