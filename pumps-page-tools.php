<?php 

function top_part($pageTitle) {
  $output = <<<ROUGEONE
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="UTF-8"> 
      <title>$pageTitle</title>
      <link rel="stylesheet" type="text/css" href="../css/wireframe.css">
      <style>@import url('https://fonts.googleapis.com/css?family=Fontdiner+Swanky');</style>
      <style>@import url('https://fonts.googleapis.com/css?family=Graduate');</style>
      <style>@import url('https://fonts.googleapis.com/css?family=Oregano');</style>
    </head>

    <body>
      <header>
ROUGEONE;
  echo $output;
} 

function mid_part() {
  $output = <<<ROUGETWO
</header> 
<!--------------------------------- Tool Bar ---------------------------------------------- -->
    <nav>
      <ul>
         <li><a href="index.html">HOME</a></li>
         <li><a href="pumps.html">GAS PUMPS</a></li>
         <li><a href="#soda">SODA MACHINES</a></li>
         <li><a href="#crew">CREW</a></li>
         <li><a href="#terms">TERMS & CONDITIONS</a></li>
         <li><a href="">CONTACT US</a></li>
      </ul>
    </nav>
<!--------------------------------- end Tool Bar --------------------------------------------- --->

    <main>
ROUGETWO;
  echo $output;
} 

function end_part() {
  $output = <<<ROUGETHREE
    </footer>
    <button class="back-to-top">
      <a href="#top" class="back-to-top" onclick='window.scrollTo(0,0)'>&uarr; Back To Top</a>
    </button>
 </body>
</html>
    <script src="../a3/phoneno-validation.js"></script>
ROUGETHREE;
  echo $output;
}

?>