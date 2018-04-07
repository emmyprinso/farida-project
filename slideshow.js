

var slideIndex = 0;
 
 
 
setInterval(change, 2000);


function change(){
	nextSlide(1);
}
function nextSlide(dir){
		
	slideIndex = slideIndex + dir;
	if(slideIndex < 1){
		slideIndex = 6;
	}
	else if(slideIndex > 6){
		slideIndex = 1;
	}
	setTo(slideIndex);
}



function setTo(Index){
	var elem = document.getElementById("image");
	elem.setAttribute("src","slideshow\\"+Index+".jpg");
	slideIndex = Index;
	

}