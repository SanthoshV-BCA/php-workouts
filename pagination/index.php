<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    /* .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      } */

    .formPopup {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }

    /* .formPopup {
        display: none;
        position: fixed;
        left: 80%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      } */
    .form {
      width: 300px;
      padding: 20px;
      background-color: #fff;
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      text-align: center;
      /* width: 80%; */
    }

    .form input[type="text"],
    .form input[type="password"] {
      width: 80%;
      padding: 15px;
      margin: 5px 0 20px 0;
      border: none;
      background: #eee;
    }

    .form input[type="text"]:focus,
    .form input[type="password"]:focus {
      background-color: #ddd;
      outline: none;
    }

    * {
      padding: 0;
      margin: 0;
    }

    .container {
      width: 80%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: auto;
      /* height: 100vh; */
    }

    h1 {
      text-align: center;
    }

    img {
      width: 50px;
      height: 50px;
    }

    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 85%;
      margin: auto;
    }

    thead {
      background-color: black;
      color: white;
    }

    td,
    th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    .ed {
      text-align: center;
      padding: 5px 5px;
      background-color: rgb(255, 0, 0);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .btn {
      text-align: center;
      padding: 5px 5px;
      background-color: rgb(0, 255, 13);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    .cancel {
      text-align: center;
      padding: 5px 5px;
      background-color: rgb(255, 0, 0);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }

    ul {
      display: flex;
      justify-content: center;
    }

    ul li {
      list-style: none;
      /* border: 1px solid black; */

    }

    ul li a {
      text-decoration: none;
    }

    .pagebtn {
      padding: 5px;
      margin-right: 5px;
    }
  </style>
</head>

<body>
  <h1>Details</h1>
  <div class="container">
    <!-- <div id="main"></div> -->
    <table id="main">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Password</th>
          <th>gender</th>
          <!-- <th>Status</th> -->
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="tableBody">
      </tbody>
    </table>
    <div id="pagination_link"></div>

    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form method="POST" class="form" id="form">
          <h2>Update</h2>
          <!-- <label for="email">
              <strong>E-mail</strong>
            </label> -->
          <input type="text" id="name" placeholder="Enter your name" name="name" />
          <input type="text" id="phone" placeholder="Enter your phone" name="phone" />

          <input type="text" id="email" placeholder="Enter your Email" name="email" />
          <!-- <label for="psw">
              <strong>Password</strong>
            </label> -->
          <input type="password" placeholder="Enter your Password" name="password" id="password" />
          <input type="text" placeholder="Enter your gender" name="gender" id="gender" />
          <button type="submit" class="btn" id="btns" onclick="update();">
            Update
          </button>
          <button type="button" class="btn cancel" onclick="closeForm();">
            Close
          </button>
        </form>
      </div>
    </div>
  </div>
  <p id="result"></p>
  <?php
  include "connection.php";
  $limit = 10;
  $sql = "SELECT COUNT(id) FROM register";
  $result = mysqli_query($conn, $sql);
  // $total_pages = ceil($total_records / $limit);
  $row = $result->fetch_row();
  $total_records = $row[0];
  $total_pages = ($total_records / $limit);
  // ceil 
  ?>
  <div>
    <ul id="pagination">
      <?php
      if ($total_pages) {
        for ($i = 1; $i <= $total_pages; $i++) {
          ?>
          <li><button class="pagebtn" onclick="myfun(<?php echo $i; ?>); myfunction();">
              <?php echo $i; ?>
            </button></li>
        <?php }
      }
      ?>
  </div>
  <script>
    var b = 1;
    function myfun(val) {
      b = val;
      console.log(b);


    }
    function myfunction() {
      // if (email == "" && password == "") {
      //     document.getElementById("result").innerHTML = "";
      //     return;
      // } else {
      var obj = new XMLHttpRequest();

      obj.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var json = JSON.parse(this.responseText);
          // while (tableBody.firstChild) {
          //   tableBody.removeChild(tableBody.firstChild);
          // }
          var element;
          var g;
          var txt = "";
          var gg;
          var el;
          var tableBody = document.getElementById("tableBody");
          while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
          }
          // for (let x in json) {
          //   element = document.querySelector("tbody");
          //   g = document.createElement("tr");
          //   // g.classList.add("sub");
          //   element.appendChild(g);
          for (let x in json) {
            var g = document.createElement("tr");
            tableBody.appendChild(g);

            txt =
              "<td>" +
              json[x].id +
              "</td>" +
              "<td>" +
              json[x].name +
              "</td>" +
              "<td>" +
              json[x].email +
              "</td>" +
              "<td>" +
              json[x].phone +
              " </td>" +
              "<td>" +
              json[x].password +
              "</td>" +
              "<td>" +
              json[x].gender +
              "</td>" +
              "<td>" +
              "<button class='ed' onclick='openForm();res(" +
              json[x].id +
              ");one();'>update</button>" +
              "</td>";

            g.innerHTML = txt;
          }
        }
      };
      obj.open("POST", "/santhosh/pagination/read/index.php?id=" + b, true);
      obj.send();
    }
    myfunction();



  </script>


  <script>

  </script>
</body>


</html>