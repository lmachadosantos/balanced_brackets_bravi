<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Balanced Brackets - Bravi</title>

    <script src="/js/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="py-5 text-center">
        <h2>Balanced Brackets - Bravi</h2>
    </div>

    <div class="row">
        <div class="col-md-12 order-md-1">
            <h4 class="mb-3">Fill in to verify that the sequence is valid.</h4>
            <form class="needs-validation" id="form_send" method="post">

                <div class="mb-3">
                    <label for="username">Only the following characters are allowed: (, ), {, }, [, or ].</label>
                    <div class="input-group">
                        <input name="characters" class="form-control" id="characters" placeholder="Enter the characters" required>
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Check</button>
            </form>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-md-12 order-md-1">
            <div class="alert alert-danger" style="display: none" id="mgsError" role="alert"></div>
            <div class="alert alert-secondary" style="display: none" id="mgsInfo" role="alert"></div>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Bravi</p>
    </footer>
</div>
    <script>

        $(function(){
            $('#form_send').submit(function(){

                $("#mgsError").html("").hide();
                $("#mgsInfo").html("").hide();

                var dataForm = $('#form_send').serialize();

                $.ajax({
                    method: "POST",
                    url: "form_send.php",
                    data: dataForm,
                    dataType: "json",
                    success: function( data )
                    {
                        if(data.code == 1)
                            $("#mgsInfo").html(data.text).show();
                        else
                            $("#mgsError").html(data.text).show();
                    }
                });

                return false;
            });
        });
    </script>

</body>
</html>