<template>
    <div class="container">

      <label for="start_date">Start Date</label>
      <input type="date" name="start_date" id="start_date" v-model="start_date" @blur="testControls" @change="testControls">
      <br/>

      <label for="end_date">End Date</label>
      <input type="date" name="end_date" id="end_date" v-model="end_date" @blur="testControls" @change="testControls">
      <br/>

      <label>Select Room Category</label>
      <select name="room_category" v-model="room_category" @blur="testControls" @change="testControls">
        <option value="Economy">Economy</option>
        <option value="Deluxe">Deluxe</option>
        <option value="Suite">Suite</option>
      </select>
      <br />

      <label>Select Room</label>
      <select v-model="selected_room" @change="testControls">
        <option v-for="room in rooms" :value="room">{{ room }}</option>
      </select>

      <br />

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

        loadRooms: function() {

          //alert('inside loadRooms');
          //console.log('inside loadRooms');

          // replace url with call to run action to lookup
          // available rooms only!

          //TODO - Fix errors when use the url below
          var url = '/rooms/get_available';

          // TEST - Loads static rooms into combo box
          //var url = '/available_rooms';

          axios.get(url)
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

        }, // end testControls

//        loadRoomCategories: function() {

//          console.log('inside loadRoomCategories');

  //        var url = '/load_categories';

  //        axios.get(url)
  //            .then(response => this.room_categories = response.data);

  //      }, //end loadRoomCategories

      }, //end methods

    mounted() {

        console.log('Make Reservation Component mounted.');

        // TODO - Add code to load room category combo box
        this.loadRoomCategories;

    } //end mounted

} //end export default

</script>
