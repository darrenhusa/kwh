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

      <input type="submit" value="Save" @click.prevent="">
      <input type="reset" value="Cancel">

    </div>
</template>

<script>
    export default {

        props: ['customer'],

        data() {

          return {
            start_date: '',
            end_date: '',
            room_category: '',

          }
        },

        methods: {

          showAlert() {

            console.log('inside showAlert')

          },

          loadRooms() {

            alert('inside loadRooms')

          },

          testControls() {

            //alert('inside testControls')

            // verify controls are not empty
            var start_date_not_empty = ! (this.start_date === '')
            var end_date_not_empty = ! (this.end_date === '')
            var category_not_empty = ! (this.room_category === '')

            console.log('start_date_not_empty = ' + start_date_not_empty)
            console.log('end_date_not_empty = ' + end_date_not_empty)
            console.log('category_not_empty = ' + category_not_empty)

            if(start_date_not_empty && end_date_not_empty && category_not_empty)
            {
                loadRooms()

            }
          },

        },

        mounted() {

          // load room category combo box

            console.log('Make Reservation Component mounted.')

        }
    }
</script>
