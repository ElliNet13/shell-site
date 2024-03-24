<html>
<head>
  <title>Shell</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    function shell() {
      var targetDiv = $('#run');
      $.ajax({
        url: `run.php?shell=${$('#code').val()}`,
        statusCode: {
          400: function(data) {
            var consolehtml = $(`<p>Error: ${data.responseText}</p>`);
            targetDiv.append(consolehtml);
          }
        },
        success: function(data) {
          var consolehtml = $(`<p>${data}</p>`);
          targetDiv.append(consolehtml);
        }
      });
    }
  </script>

</head>
<body>
  <h1>Shell</h1>
  <div id="run"></div>
  <br><button onclick="shell()">Run</button>
  <br><input id="code" type="text">
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
</body>
</html>