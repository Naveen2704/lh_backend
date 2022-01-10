
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LittleHathee</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      @import url('https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;900&display=swap');
      html,body,table,th,td,label,a,h1,h2,h3,h4,h5,h6,div,section,small,sub,sup,p,input,textarea,button,li{
          font-family: 'Jost', sans-serif !important;
      }
  </style>
</head>
<body class="hold-transition login-page bg-dark">

<?php $this->load->view($view); ?>

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
    $(document).ready(function(){
        $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
            $(".flash-msg").slideUp(500);
        });
    });
</script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyByjD9sF1q_tTKvVofpr_xJUxnE8fq1dJQ",
    authDomain: "magichomes-534cb.firebaseapp.com",
    databaseURL: "https://magichomes-534cb.firebaseio.com",
    projectId: "magichomes-534cb",
    storageBucket: "magichomes-534cb.appspot.com",
    messagingSenderId: "803668485361",
    appId: "1:803668485361:web:7069cf937d013370b5b550",
    measurementId: "G-4VPZBCQX1X"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  console.log(firebase.getInstance().getToken())
  firebase.analytics();
</script>
</body>
</html>
