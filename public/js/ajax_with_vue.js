// Vue.config.devtools = true;

new Vue({
  el: '#app',
  data: {
    available_rooms: []
  },

  mounted() {
    // Make an ajax request and render the response

    // axios
    // axios.get('/available_rooms').then(response => console.log(response.data));
    axios.get('/available_rooms').then(response => this.available_rooms = response.data);

  }
});
