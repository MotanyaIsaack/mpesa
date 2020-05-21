
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .hidden{
            display: none;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/mpesa.css" rel="stylesheet">
</head>
<body class="text-center">

    <form id="mpesa-stk-push-form" method="POST" class="form-signin">
        <div id="message">

        </div>
        <h1 class="h3 mb-3 font-weight-normal">Mpesa Payment</h1>
        <label for="phone-number" class="sr-only">Phone Number</label>
        <input name="phone" type="number" id="phone-number" class="form-control" placeholder="254792651712" required autofocus>
        <input style="display: none" value="1" name="amount" type="number" id="amount" class="form-control">

        <button id="submit-mpesa" class="btn btn-lg btn-primary btn-block mt-4" type="submit">Submit</button>
        <button id="confirm-mpesa" class="hidden btn btn-lg btn-primary btn-block" type="button">Confirm Payment</button>

    </form>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script>

   $(()=>{

        $('#mpesa-stk-push-form').on('submit',function (event) {
            event.preventDefault();
            let phone = $('input[name=phone]');
            let amount = 1;
            const url = "http://10a9d720.ngrok.io/Development/mpesa/dist/processMpesa.php";
            const data = $('#mpesa-stk-push-form').serializeArray();
            $.ajax({
                url:url,
                data:data,
                type:'POST',
                dataType:'json',
                success: function (res) {
                    if (res.ok){
                        $('#message').html(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                            '                <strong>'+res.msg+'</strong> \n' +
                            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                            '                    <span aria-hidden="true">&times;</span>\n' +
                            '                </button>\n' +
                            '            </div>');

                        setTimeout(function () {
                            $('#message').html('');
                            let confirmUrl = "http://10a9d720.ngrok.io/Development/mpesa/dist/ConfirmPayment.php";
                            let dataC = {}
                            $.ajax({
                                url:confirmUrl,
                                type:'POST',
                                data:dataC,
                                dataType:'json',
                                success: function (response) {
                                    if (response.ok){
                                        $('#message').html(
                                            '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                                            '                <strong>'+response.msg+'</strong> \n' +
                                            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                            '                    <span aria-hidden="true">&times;</span>\n' +
                                            '                </button>\n' +
                                            '            </div>');
                                    }else{
                                        $('#message').html(
                                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
                                            '                <strong>'+response.msg+'</strong> \n' +
                                            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                                            '                    <span aria-hidden="true">&times;</span>\n' +
                                            '                </button>\n' +
                                            '            </div>');
                                    }
                                }
                            });
                        },20000)
                    }else{
                        $('#message').html(
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
                            '                <strong>'+res.msg+'</strong> \n' +
                            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                            '                    <span aria-hidden="true">&times;</span>\n' +
                            '                </button>\n' +
                            '            </div>');
                    }

                }
            });
        });
   });
</script>
</html>
