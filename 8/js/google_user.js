      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        var google_id = profile.getId();
          var google_name = profile.getName();
          var google_img = profile.getImageUrl();
          var google_email = profile.getEmail();
        console.log("ID: " + google_id); // Don't send this directly to your server!
        console.log("Name: " + profile.getName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
          if(googleUser){
              $('[name="id"]').val(google_id);
              $('[name="name"]').val(google_name);
              $('[name="img"]').val(google_img);
              $('[name="email"]').val(google_email);
              $('[name="token"]').val(id_token);
   $("#send_file").submit();   
    }
      };
