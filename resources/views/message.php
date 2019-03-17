<html>
   <head>
      <title>jQuery Ajax Example</title>
   </head>
   <body>
      <div id='msg'>
        <p>This message will be replaced using Ajax.
         Click the button to replace the message.
       </p>
       </div>
      <?php
         echo Form::button('Replace Message',['onClick'=>'getMessage()']);
      ?>

      <!-- NOTE - placed javascript above closing body tag! -->
      <!-- load jQuery -->
      <script src="http://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>

        <!--  load custom javascript -->
        <!--  TO DO - try moving code to an external file-->
      <script>
         function getMessage() {
           // Note: use alert as a good debugging tool!
           // alert("inside get message()");

           // version 1 - test that can return json data, write it to console
           // tested successfully on 3/16/2019
           // uses Google Chrome Developer tools - F12
           
          //  $.getJSON('/load_data', function(data) {
          //        console.log(data);
          //      });
          // } // end getMessage

          // version 2 - write data to web page
          $.getJSON('/load_data', function(data) {
              $("#msg").html(data.msg);
          });

        } // end getMessage

      </script>
   </body>
</html>
