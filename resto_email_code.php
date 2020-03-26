
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Vérication Email</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .jumbotron.text-center {
        height: 17em;
    }

    input.form-control.col-md-6 {
        width: 50%;
        margin-right: 1em;
        display: inline;
    }

    div#notes {
        margin-top: 2%;
        width: 98%;
        margin-left: 1%;
    }

    @media (min-width: 991px) {
        .col-md-9.col-sm-12 {
            margin-left: 12%;
        }
    }
</style>
</head>

<body>

    <div class="container">
    <!-- Instructions -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="alert alert-success col-md-8" role="alert" id="notes">
        <h4>NOTES</h4>
        <ul>
            <li>Vous recevrez un code de vérification sur votre courrier après votre inscription.</li>
            <li> Entrez ce code ci-dessous.</li>
        </ul>
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- Verification Entry Jumbotron -->
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="jumbotron text-center">
            <h2>Entrez le code de vérification</h2>
            <form method="post" action="controleur.php?action=checkPasswordCode" id="form">
            <div class="col-md-9 col-sm-12">
                <div class="form-group form-group-lg">
                <input type="number" class="form-control col-md-6 col-sm-6 col-sm-offset-2" name="verifyCode" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="from-group">
                    <label for="password">Nouveau mot de passe<span class="text-danger">*</span></label>
                    <input  type="password" name="newPassword" id="newPassword" class="form-control"  required/>
                    <a href="#" onclick="password_recovery()">Mot de passe oublié?</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="from-group">
                    <label for="password">Conformez<span class="text-danger">*</span></label>
                    <input  type="password" name="newPassword1" id="newPassword1" class="form-control"  required/>
                    <a href="#" onclick="password_recovery()">Mot de passe oublié?</a>
                </div>
            </div>
            <div class="from-group">
                <input class="btn btn-primary btn-lg" type="submit" value="Validez">
            </div>
            </div>
            
            </form>
        </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
    

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>


<script>
    // Attach a submit handler to the form
    $( "#form" ).submit(function( event ) {
        // alert('ok');
        // Stop form from submitting normally
        event.preventDefault();
    
        // Get some values from elements on the page:
        var $form = $( this ),
        term  = {
        'verifyCode' : $('input[name=verifyCode]').val(),
        'newPassword' : $('input[name=newPassword]').val(),
        };
        url = $form.attr( "action" );
    
        // Send the data using post
        var posting = $.post( url, { verifyCode:term.verifyCode, newPassword:term.newPassword } );
    
        // Put the results in a div
        posting.done(function( data ) {
        if (data == 1) {
            window.location.href = "transfert.php";
        } else {
            alert("Erreur Code")
        }  
        });
    });
</script>
</body>
</html>