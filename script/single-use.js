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

// for check-in.html
function checkin() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("checkin").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "/PHP/update-in.php", true);
  xhttp.send();
}

// for check-out.html
function checkout() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("checkout").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "/PHP/update-out.php", true);
  xhttp.send();
}

// for remove-inventory.html
function remove() {
  allFilled();
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("remove").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "/PHP/remove.php", true);
  xhttp.send();
}

// for add-inventory.html
let state;

function displayData() {   // for existing items (ie yes it exists)
  $(document).ready(function () { 
    createCookie("upc", sessionStorage.getItem('upc'), "10"); 
  }); 
  
  let buttons = document.getElementById('buttons');
  let buttonSetting = buttons.style.display;
  let itemInfo = document.getElementById('info');
  let displaySetting = itemInfo.style.display;
  let cancel = document.getElementById('return');

  if (cancel.style.display == 'none') {
    cancel.style.display = 'block';
  }

  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("return").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/PHP/get-item-data.php", true);
  xhttp.send();

  if (buttonSetting == 'none') {
    buttons.style.display = 'block';
  }
  if (displaySetting == 'block') {
    itemInfo.style.display = 'none';
  }
  state = 'yes';
  return state;
}

function displayForm() {   // for new items (ie no it doesn't exist)
  $(document).ready(function () { 
    createCookie("upc", sessionStorage.getItem('upc'), "10"); 
  }); 
  let itemInfo = document.getElementById('info');
  let displaySetting = itemInfo.style.display;
  let buttons = document.getElementById('buttons');
  let cancel = document.getElementById('return');

  if (displaySetting == 'none') {
    itemInfo.style.display = 'block';
    buttons.style.display = 'block';
    cancel.style.display = 'none';
  }
  state = 'no';
  return state;
}

function add() {
  allFilled();
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("add").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "/PHP/add.php", true);
  xhttp.send();
}

function allFilled() {
  let filled = true;
  document.getElementById("required").querySelectorAll("[required]").forEach(function(i) {
    if (!filled) {return;}
    if (!i.value) {filled = false;}
  })
  if (!filled) {
    alert('Fill all required fields.');
  }
}