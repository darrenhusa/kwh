new Vue({
  el: '#room_select',
  data: {
    selected: '',
    rooms: []
  },

  mounted() {
    // Make an ajax request and render the response
    // alert('alert');
    // axios.get('/available_rooms').then(response => console.log(response.data));
    // test
    axios.get('/available_rooms').then(response => this.rooms = response.data);

    // axios.get('/rooms/get_available').then(response => this.rooms = response.data);

  }
})
