<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ajax</title>
  </head>
  <body>
    <form>
      Enter Your name:
      <input type="text" id="name" name="name" onkeyup="my(this.value)" />
      <h1 id="text"></h1>
    </form>

    <script>
      function my(str) {
        if (str.length == 0) {
          document.getElementById("text").innerHTML = "";
          return;
        } else {
          var obj = new XMLHttpRequest();
          obj.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("text").innerHTML = this.responseText;
            }
          };
          obj.open("GET", "myphp.php?value=" + str, true);
          obj.send();
        }
      }
    </script>
  </body>
</html>
