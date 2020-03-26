    // Attach a submit handler to the form
    $( "#msform" ).submit(function( event ) {
        // alert('ok');
        // Stop form from submitting normally
        event.preventDefault();
      
        // Get some values from elements on the page:
        var $form = $( this ),
          term  = {
          'nom' : $('input[name=nom]').val(),
          'prenom' : $('input[name=prenom]').val(),
          'pays' : $('#select').val(),
          'ville' : $('input[name=ville]').val(),
          'adresse' : $('input[name=adresse]').val(),
          'email' : $('input[name=email_user]').val(),
          'pass' : $('input[name=pass]').val(),
          'cpass' : $('input[name=cpass]').val()
          };
          url = $form.attr( "action" );
      
        // Send the data using post
        var posting = $.post( url, { nom:term.nom, prenom:term.prenom, pays:term.pays, ville:term.ville, adresse:term.adresse, email_user:term.email, pass:term.pass, cpass:term.cpass } );
      
        // Put the results in a div
        posting.done(function( data ) {
          if (data == 1) {
            window.location.href = "mailSending.php";
          } else {
            alert("Erreur lors de l'enregistrement")
          }  
        });
      });

      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "https://restcountries-v1.p.rapidapi.com/all",
        "method": "GET",
        "headers": {
          "x-rapidapi-host": "restcountries-v1.p.rapidapi.com",
          "x-rapidapi-key": "8060e1ec6dmsh3388c6f68b9389cp142996jsnb22769070466"
        }
      }

      $.ajax(settings).done(function (response) {
        console.log(response);
        for (let i = 0; i < response.length; i++) {
          const element = response[i];
          $('#select').append('<option>'+ element.name +'</option>');
        }
      });