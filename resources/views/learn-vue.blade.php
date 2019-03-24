<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!--  -->
  <div id="root">
    <input type="text" id="input" v-model="message">

    <p>The value of the input is @{{ message }}</p>
  </div>

  <!-- load vue -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>

  <script>

    new Vue({
      el: '#root',
      data: {
        message: 'Hello World'
      }

    })

  </script>
</body>
</html>
