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

number = document.querySelectorAll(".number-order");

function decrease_number(index) {
  number_inner = parseInt(number[index].innerHTML);
  if (number_inner > 0) {
    number_inner--;
    number[index].innerHTML = number_inner;
  }
}

function increase_number(index) {
  number_inner = parseInt(number[index].innerHTML);
  number_inner++;
  number[index].innerHTML = number_inner;
}
