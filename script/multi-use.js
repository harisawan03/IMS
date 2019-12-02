// for landing pages
function showInventory() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("inventory").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/PHP/get-inventory.php", true);
  xhttp.send();
}

// for confirmation pages
function showUpdate() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("confirm").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/PHP/confirm-inventory.php", true);
  xhttp.send();
}

// function getUPC() {
  
// }