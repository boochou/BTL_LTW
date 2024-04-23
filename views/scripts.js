function sidebar_open() {
  document.getElementById("mySidebar").style.visibility = "visible";
  document.getElementById("mySidebar").style.marginLeft = "0";
  document.getElementById("blur-sidebar").style.visibility = "visible";
}

function sidebar_close() {
  document.getElementById("mySidebar").style.visibility = "hidden";
  document.getElementById("mySidebar").style.marginLeft = "-100%";
  document.getElementById("blur-sidebar").style.visibility = "hidden";
}
