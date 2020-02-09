<?php
$fetch=new Fetch();
$results=$fetch->imageonFetch();
foreach($results as $result)
{
  ?>
  <img class="mySlides"src="<?php echo($result['filelocation']);?>" alt="Image here">
  <?php
}

?>
<div class="carbutton">
  <div>
    <button onclick="plusDivs(-1)">Previous</button>

  </div>
  <div>
  <button onclick="plusDivs(+1)">Next</button>
  </div>
</div>
<script>
  var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  x[slideIndex-1].style.display = "block"; 
}

</script>
