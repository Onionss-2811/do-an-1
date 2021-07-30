<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/css/font-awesome.min.css" rel="stylesheet">
<style>

#myBtn {
  display: none;
  position: fixed;
  bottom: 240px;
  right: 20px;
  z-index: 99;
  border: none;
  outline: none;
  background: transparent; 
  /*background-color: silver;*/
  color: black;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  /*background-color: #555;*/
}
</style>
</head>
<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up fa-2x"></i></button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

</body>
</html>
