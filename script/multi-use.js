// Function to create the cookie 
function createCookie(name, value, days) { 
  var expires; 
  
  if (days) { 
      var date = new Date(); 
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
      expires = "; expires=" + date.toGMTString(); 
  } 
  else { 
      expires = ""; 
  } 
  
  document.cookie = escape(name) + "=" +  
      escape(value) + expires + "; path=/"; 
}

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
  $(document).ready(function () { 
    createCookie("upc", sessionStorage.getItem('upc'), "10"); 
  });
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("confirm").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/PHP/confirm-inventory.php", true);
  xhttp.send();
}

function deleteCookies() {
  document.cookie = "upc=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
  document.cookie = "name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
}