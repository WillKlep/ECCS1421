// function for showing/hiding table and input
var x = document.getElementById("showDB");
x.style.display = "none";

function showHide() {
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function show(){
	x.style.display = "block";
}