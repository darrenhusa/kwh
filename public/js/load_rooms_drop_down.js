Vue.component('make-reservation-component', {

  props: [
    'customer_no': '',
    'last_name': '',
    'first_name': '',
  ],

  data() {

    return {
      start_date: '',
      end_date: '',

      selected_room: '',
      rooms: []

    }
  }

  template: `
    <label for="full_name">Book room for {{ $customer->last_name }}, {{ $customer->first_name }}</label>
    <br/>

    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" v-model="start_date">
    <br/>

    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" v-model="end_date">
    <br/>

    <label>Select Room</label>
    <select v-model="selected_room">
      <option v-for="room in rooms" v-bind:value="room">@{{ room }}</option>
    </select>
    <br />
    `,

    methods: {
      onSubmit() {
        // alert('onSubmit');
        var data = {
          'start_date': this.start_date,
          'end_date': this.end_date,
          // 'room_category': this.room_category,
          'room_no': this.selected_room,
          'amount': 0,
          // 'customer_no': this.customer_no,
          // 'created_at': ,
          // 'updated_at': ,
        };

        console.log(data);

          axios.post('/customers/registrations', data)
              .then(function (response) {
                  console.log(response);
                })
                .catch(function (error) {
                  console.log(error);
          });
      }
    },

    mounted() {
      // Make an ajax request and render the response
      // test
      axios.get('/available_rooms').then(response => this.rooms = response.data);

      // axios.get('/rooms/get_available').then(response => this.rooms = response.data);

    }
})

new Vue({

  el: '#myForm',

})
