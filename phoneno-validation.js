/*function validateno() {  
  var regexPhone = /[+ 0-9x()]+/g;
  
  var textinput = document.getElementById('phoneno1').value;
  if (textinput.match(regexPhone) || textinput == '') {
    return true;
  } else {
    document.getElementById('phoneno1').style.border = "2px solid red";
    return false;
  }
}*/

function removeilliegalchar() {
  // Regular expression for the characters need to be removed
  var regexRemove = /[^\+\ 0-9x\(\)]/g;
  // Regular expression for the characters accepted
  var regexPhone = /^[\+\ 0-9x\(\)]+$/;
  
  var textinput = document.getElementById('phoneno1').value;
  if (textinput.match(regexPhone) || textinput == '') {
    return true;
  } else {
    //document.getElementById('phoneno1').style.border = "2px solid red";
    document.getElementById('phoneno1').value = textinput.replace(regexRemove, '');
    console.log(document.getElementById('phoneno1').value);
    return false;
  }
}

function validateNANP() { 
  var regexPhoneNANP = /^(\+)+[1]{1}(\ )?(((\()\d{3}(\)))|(\d{3}))(\ )?\d{3}(\ )?\d{4}((\ )?x{1}(\ )?\d{1,5})?$/;
  
  var textInput = document.getElementById('phoneno1').value;
  //console.log(regexPhoneNANP.test(textInput));
  document.getElementById('img1').style.visibility = (regexPhoneNANP.test(textInput) ? 'visible' : 'hidden');
}

document.getElementById('checkbox1').onclick = function storeData() {
  if (typeof(Storage) !== "undefined") {
    if(this.checked) {
      localStorage.setItem("localStorage", "true");
      localStorage.setItem("Name", document.getElementById('name1').value);
      localStorage.setItem("Email", document.getElementById('email1').value);
      localStorage.setItem("Address", document.getElementById('address1').value);
      localStorage.setItem("Phoneno", document.getElementById('phoneno1').value);
      localStorage.setItem("isChecked", "true");
    } else {
      localStorage.setItem("localStorage", "true");
      localStorage.removeItem("Name");
      localStorage.removeItem("Email");
      localStorage.removeItem("Address");
      localStorage.removeItem("Phoneno");
      localStorage.setItem("isChecked", "false");
    }
  }
}

function startup() {
  if (typeof(Storage) !== "undefined") {
    var name = localStorage.getItem("Name");
    var email = localStorage.getItem("Email");
    var address = localStorage.getItem("Address");
    var phoneno = localStorage.getItem("Phoneno");
    var isChecked = localStorage.getItem("isChecked");
    if (typeof name !== 'undefined' && name !== null) {
      document.getElementById('name1').value = name;
    }
    if (typeof email !== 'undefined' && email !== null) {
      document.getElementById('email1').value = email;
    }
    if (typeof address !== 'undefined' && address !== null) {
      document.getElementById('address1').value = address;
    }
    if (typeof phoneno !== 'undefined' && phoneno !== null) {
      document.getElementById('phoneno1').value = phoneno;
    }
    if (typeof isChecked !== 'undefined' && isChecked !== null) {
      if (isChecked == "true") {
        document.getElementById('checkbox1').checked = true;
      } else {
        document.getElementById('checkbox1').checked = false;
      }
    }
  }
}
