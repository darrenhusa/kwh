<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <div id="app">
    <ul>
      <li v-for="room in available_rooms" v-text="room"></li>
    </ul>
  </div>


  <!-- load vue -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script> -->

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script src="/js/ajax_with_vue.js"></script>
</body>
</html>
