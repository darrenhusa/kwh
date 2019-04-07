<template>
    <div class="container">

      <label for="start_date">Start Date</label>
      <input type="date" name="start_date" id="start_date" v-model="start_date" @blur="testControls">
      <br/>

      <label for="end_date">End Date</label>
      <input type="date" name="end_date" id="end_date" v-model="end_date" @blur="testControls">
      <br/>

      <label>Select Room Category</label>
      <select name="room_category" v-model="room_category" @blur="testControls">
        <option value="Economy">Economy</option>
        <option value="Deluxe">Deluxe</option>
        <option value="Suite">Suite</option>
      </select>
      <br />

      <label>Select Room</label>
      <select v-model="selected_room">
        <option v-for="room in rooms" :value="room">{{ room }}</option>
      </select>
      <br />

      <input type="submit" value="Save" @click.prevent="saveReservation">
      <input type="reset" value="Cancel">

    </div>
</template>

<script>
    export default {

        props: ['customer'],

        data: function() {

          return {
            start_date: '',
            end_date: '',
            room_category: '',

            selected_room: '',
            rooms: []

          } //end return

        }, // end data

    methods: {

        saveReservation: function() {

          console.log('inside saveReservation');

          var data = {
            'start_date': this.start_date,
            'end_date': this.end_date,
            'room_category': this.room_category,
            'room_no': this.selected_room,
            'amount': 0,
            'customer_no': this.customer.id,
            'created_at': null,
            'updated_at': null,
          };

          console.log(data);

          //axios.post('/customers/registrations', data)
          //    .then(function (response) {
          //        console.log(response);
          //      })
          //      .catch(function (error) {
          //        console.log(error);
          //});

        }, //end saveReservation

        loadRooms: function() {

          //alert('inside loadRooms');
          console.log('inside loadRooms');

          axios.get('/available_rooms')
              .then(response => this.rooms = response.data);

        }, //end loadRooms

        testControls: function() {

          //alert('inside testControls')
          //console.log('inside testControls')

          // verify controls are not empty
          var start_date_not_empty = ! (this.start_date === '');
          var end_date_not_empty = ! (this.end_date === '');
          var category_not_empty = ! (this.room_category === '');

          //console.log('start_date_not_empty = ' + start_date_not_empty);
          //console.log('end_date_not_empty = ' + end_date_not_empty);
          //console.log('category_not_empty = ' + category_not_empty);

          if(start_date_not_empty && end_date_not_empty && category_not_empty)
          {
              //console.log('All the controls are populated!');

              this.loadRooms();

          }

        } // end testControls

      }, //end methods

    mounted() {

      // TODO - Add code to load room category combo box
        console.log('Make Reservation Component mounted.');

    } //end mounted

} //end export default

</script>
