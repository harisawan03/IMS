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

function displayData() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("return").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/PHP/get-item-data.php", true);
  xhttp.send();

  let buttons = document.getElementById('buttons');
  let buttonSetting = buttons.style.display;
  let itemInfo = document.getElementById('info');
  let displaySetting = itemInfo.style.display;

  if (buttonSetting == 'none') {
    buttons.style.display = 'block';
  }
  if (displaySetting == 'block') {
    itemInfo.style.display = 'none';
  }
  state = 'yes';
  return state;
}

function displayForm() {
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
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("add").innerHTML = this.responseText;
    }
  };
  if (state == 'yes') {
    xhttp.open("POST", "/PHP/add-existing.php", true);
  } else {
    xhttp.open("POST", "/PHP/add-new.php", true);
  }
  xhttp.send();
}