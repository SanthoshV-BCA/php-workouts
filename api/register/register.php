<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    name<input type="text" name="name" id="name">
    phone<input type="text" name="phone" id="phone">
    email<input type="email" name="email" id="email">
    password<input type="password" name="password" id="password">
    gender<input type="text" name="gender" id="gender">
    <input type="submit" value="register" id="submit">
    <p id="result"></p>

    <script>
        document.getElementById('submit').addEventListener('click', function (e) {
            e.preventDefault();

            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var gender = document.getElementById('gender').value;

            fetch('/santhosh/api/register/register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    name: name,
                    phone: phone,
                    email: email,
                    password: password,
                    gender: gender
                }),
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerText = JSON.stringify(data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>