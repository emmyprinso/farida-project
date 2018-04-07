




function myMove() {
  var elem = document.getElementById("myAnimation");   
  var pos = 0;
  var inc=1;
  var id = setInterval(frame, 10);
  function frame() {
    if (pos >= 300) {
      //clearInterval(id);
	  inc = -1;
    } 
	else if(pos <= 0){
		inc = 1;
	}

      pos = pos + inc; 
      //elem.style.top = pos + 'px'; 
      elem.style.left = pos + 'px'; 
    
  }
}


/*
var slideIndex = 0;

function nextSlide(var dir){
	alert("I was called");
	var element = document.getElementById("image");
	slideIndex = slideIndex + dir;
	if(slideIndex < 1){
		slideIndex = 6;
	}
	else if(slideIndex > 6){
		slideIndex = 1;
	}
	element.src = "slideshow\\" + slideIndex + ".jpg";
}
*/