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
numberofitem = document.querySelectorAll(".numberofitem");

function decrease_number(index) {
  number_inner = parseInt(number[index].innerHTML);
  if (number_inner > 0) {
    number_inner--;
    number[index].innerHTML = number_inner;
    numberofitem[index].value = number_inner;
    total_count();
  }
}

function increase_number(index) {
  number_inner = parseInt(number[index].innerHTML);
  number_inner++;
  number[index].innerHTML = number_inner;
  numberofitem[index].value = number_inner;
  total_count();
}

function total_count() {
  let totalPrice = 0;

  document.querySelectorAll(".price-food").forEach((priceDiv, index) => {
    let priceText = priceDiv.textContent;
    let price = parseFloat(priceText.replace(/ đ\/món$/, ""));
    totalPrice += price * parseFloat(number[index].innerHTML);
  });

  var sumPrice = document.getElementById("sum-price");
  var sumprice = document.getElementById("sum-price-hidden");
  sumPrice.innerHTML = totalPrice + '<u style="padding-left: 3px">đ</u>';
  sumprice.value = totalPrice;
}

total_count();

var formCart = document.getElementById("cart-form");
formCart.addEventListener("submit", function (event) {
  event.preventDefault();
  var formData = new FormData(this);
  fetch("../controller/user/product-in-cart.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      console.log(data);
      alert(data);
      window.location.reload();
      console.log(data);
    })
    .catch((error) => {
      console.log(error);
      alert("Error submitting form. Please try again later.");
    });
});
