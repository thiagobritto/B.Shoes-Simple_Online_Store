
/* Script js */

get("#btn-menu").onclick = event => {
	get(".navbar_menu").classList.toggle("navbar_menu_on");
}

get("#close_back").onclick = event => {
	get(".navbar_menu").classList.toggle("navbar_menu_on");
}

get("#close_area").onclick = event => {
	get(".navbar_menu").classList.toggle("navbar_menu_on");
}

get(".navbar_menu").ontransitionend = function(event) {
	//console.log(event);
}