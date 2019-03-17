<html>
   <head>
      <title>Congress API jQuery/AJAX Example</title>
   </head>

   <body>
     <h3>Test</h3>
		<!-- <p>
		Fill in your address and we will look up the answer.
    This requires JavaScript to work.
    If you can't find them here, <a href="http://www.opencongress.org/people/senators" target="_blank">try OpenCongress</a>.
		</p> -->

		<form action="" id="rep-lookup">
			<div>
			     <input type="submit" id="btn-lookup" value="Load Data" />
			</div>
		</form>

  		<!-- <div id="rep-lookup-results">
  			<em>When senators are found, they will be displayed here.</em>
  		</div> -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    // 'use strict';

    $(document).ready(function() {
    	$('#btn-lookup').submit(function(e){
    		e.preventDefault();

        alert('inside function');

        // let options = {
        //     url: 'https://api.propublica.org/congress/v1/115/senate/bills/passed.json',
        //     headers: {
        //         'X-API-Key': 'Ku3xYVvkcEx6IZwXCvP44TRx0wSYiUtYRxIsfQZX'
        //     },
        //     json: true
        // };
        url = '/load_data';

    		$.getJSON(url, function(data){
            console.log(data);
          });
        });
      });
      </script>
    </body>
</html>
