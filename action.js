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