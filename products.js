var t = 0;
var l = 0;


function illusion(obj){
	
	var elem = obj.querySelectorAll("img");			//getElementByClassName("itemImageBox"); //.getElementByClassName("image");
	elem[0].style.top = 15;
	elem[0].style.right = -50;
	//elem[0].style.z-index = 1;
	
/*	elem[0].style.max-width = 200%;
	elem[0].style.max-height = 200%;
	elem[0].style.width = 150%;
	elem[0].style.height = 150%;	*/
}

function illusionOut(obj){
	var elem = obj.querySelectorAll("img");			//getElementByClassName("itemImageBox"); //.getElementByClassName("image");
	elem[0].style.top = 0;
	elem[0].style.right = 0;	
	//elem[0].style.z-index = -1;
	
/*	elem[0].style.max-width = 100%;
	elem[0].style.max-height = 100%;
	elem[0].style.width = 100%;
	elem[0].style.height = 100%;	*/
	}