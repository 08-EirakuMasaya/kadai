<html lang="ja">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="880365618283-gv87plj6g5mplhomvr1q6gahpl4p4fas.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <form action="login_execute.php" method="post" id="send_file">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="name" value="">
            <input type="hidden" name="img" value="">
            <input type="hidden" name="email" value="">
            <input type="hidden" name="token" value="">
        </form>
        <script src="js/jquery-2.1.1.min.js"></script>
    <script>
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
        </script>
  </body>
</html>