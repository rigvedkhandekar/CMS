// Get the modal
function imgPop(img,type)
{
  var modal = document.getElementById("ssModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
  var modalImg = document.getElementById("screenshotImg");
  modal.style.display = "block";
  if (type == 'complainee')
  {
  modalImg.src = "../screenshots/"+img;
  }
  else
  {
  modalImg.src = "../revert_screenshots/"+img;
  }// captionText.innerHTML = this.alt;


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

}