<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Pawsitivity</title>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date" ).datepicker();
  } );
  $("[data-menu-underline-from-center] a").addClass("underline-from-center");
  </script>
  <style>
      
.hover-underline-menu {
  width: 100%;
}

.hover-underline-menu .menu {
  background-color: #8a8a8a;
}

.hover-underline-menu .menu a {
  color: #fefefe;
  padding: 1.2rem 1.5rem;
}

.hover-underline-menu .menu .underline-from-center {
  position: relative;
}

.hover-underline-menu .menu .underline-from-center::after {
  content: "";
  position: absolute;
  top: calc(100% - 0.125rem);
  border-bottom: 0.125rem solid #fefefe;
  left: 50%;
  right: 50%;
  transition: all 0.5s ease;
}

.hover-underline-menu .menu .underline-from-center:hover::after {
  left: 0;
  right: 0;
  transition: all 0.5s ease;
}


  </style>
  <link href="../../program3-woodbud1/css/foundation.css" rel="stylesheet" type="text/css"/>
    <link href="../../program3-woodbud1/css/foundation.css" rel="stylesheet" type="text/css"/>
</head>
<!-- the body section -->
<body>
    <header>
        <img src="../../Personal_Capstone/images/logo.JPG" alt=""/>
        <a href="tel:5554280940"><img src="../../Personal_Capstone/images/phone.JPG" alt=""/></a>
      <a href="mailto:pawsensitive@gmail.com"><img src="../../Personal_Capstone/images/email.JPG" alt=""/></a>

      <nav class="hover-underline-menu" data-menu-underline-from-center>
  <ul class="menu align-center">
      <hr>
  </ul>
</nav>
    </header>
