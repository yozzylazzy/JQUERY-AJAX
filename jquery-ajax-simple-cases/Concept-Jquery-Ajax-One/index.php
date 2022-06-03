<!doctype html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>AJAX SEDERHANA (KONSEP)</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="container-xxl">
            <form id="loginform" method="post">
                <div>
                    Username:
                    <input type="text" name="username" id="username" />
                    Password:
                    <input type="password" name="password" id="password" />
                    <input type="submit" name="loginBtn" id="loginBtn" value="Login" />
                </div>
            </form>
        </div>
        <div id="liveAlertPlaceholder"></div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#loginform').submit(function(e) {
                e.preventDefault(); //Method cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur.
                /*For example, this can be useful when:
                Clicking on a "Submit" button, prevent it from submitting a form
                Clicking on a link, prevent the link from following the URL
                Note: Not all events are cancelable. Use the cancelable property to find out if an event is cancelable.
                Note: The preventDefault() method does not prevent further propagation of an event through the DOM. Use the stopPropagation() method to handle this.*/
                $.ajax({
                    type: "POST",
                    url: 'login.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        let jsonData = JSON.parse(response);

                        // user is logged in successfully in the back-end
                        // let's redirect
                        if (jsonData.success == "1") {
                            alert('Nice, you triggered this alert message!', 'success')
                        } else {
                            alert('Password and Username Differ!!', 'danger')
                        }
                    }
                });
            });
        });
        let alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        let alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            let wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'

            alertPlaceholder.append(wrapper)
        }
    </script>
</body>

</html>