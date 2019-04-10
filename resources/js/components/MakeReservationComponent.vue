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

      <p name="room_rate" v-model="room_rate">{{ room_rate }}</p>

      <br />

      <label>Select Room</label>
      <select name="selected_room" v-model="selected_room" @change="testControls">
        <option v-for="room in rooms" :value="room">{{ room }}</option>
      </select>

      <p name="availability" v-model="availability">{{ availability }}</p>

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
            rooms: [],

            room_rate: '',
            availability: '',

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

          // For diagnostic printouts!
          var data = {
            'start_date': this.start_date,
            'end_date': this.end_date,
            'room_category': this.room_category,
            'room': this.selected_room,
            'room_rate': this.room_rate,
            'availability': this.availability,
          };

          console.log('data = ' + data);
          //alert(data);

          axios.get(url, {
              params: {
                start_date: this.start_date,
                end_date: this.end_date,
                room_category: this.room_category,
                }
              }).then(response => this.rooms = response.data)
              .then(function (response) {
                 console.log(response);
               })
               .catch(function (error) {
                 console.log(error);
               });

        }, //end loadRooms

        testControls: function() {

          //alert('inside testControls')
          //console.log('inside testControls')

          // verify controls are not empty
          var start_date_not_empty = ! (this.start_date === '');
          var end_date_not_empty = ! (this.end_date === '');
          var category_not_empty = ! (this.room_category === '');
          var room_not_empty = ! (this.selected_room === '');

          //console.log('start_date_not_empty = ' + start_date_not_empty);
          //console.log('end_date_not_empty = ' + end_date_not_empty);
          //console.log('category_not_empty = ' + category_not_empty);

          if(category_not_empty)
          {
              console.log('Get room rate');

              this.getRoomRate();
          }

          if(start_date_not_empty && end_date_not_empty && category_not_empty)
          {
              //console.log('All the controls are populated!');

              this.loadRooms();
          }

          if(room_not_empty)
          {
              console.log('Get room availability');

              this.getRoomAvailability();
          }

        }, // end testControls

          getRoomRate: function() {

            //console.log('inside getRoomRate');

            var url = '/get_room_rate';

            axios.get(url, {
                params: {
                  room_category: this.room_category,
                }
            //}).then(response => console.log(response.data));
            }).then(response => this.room_rate = response.data);

          }, //end getRoomRate

          getRoomAvailability: function() {

            console.log('inside getRoomAvailability');

            var url = '/get_room_availability';

            axios.get(url, {
                params: {
                  room_no: this.selected_room,
                  }
                }).then(response => console.log(response.data));
                //}).then(response => this.availability = response.data);

          }, //end getRoomAvailability

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
        //this.loadRoomCategories;

    }, //end mounted

    updated() {

        console.log('Component updated.');

        this.testControls;

    }, //end mounted


} //end export default

</script>
