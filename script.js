// ----------------- JavaScript file of Horizon CSR Official Store -----------------
//
//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Entrance   /////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

"use strict";

var signUpBox = document.getElementById("signUp");
var signInBox = document.getElementById("signIn");
var adminSignInBox = document.getElementById("adminSignIn");

function changeView() {
  // alert("Change View");

  signUpBox.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////   User   ///////////////////////////////////////////////////////////

//
//

//
//////////////////////////////////////////////////////   Sign Up   //////////////////////////////////////////////////////////
//

function showSignUp() {
  // alert("Show Sign Up");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

function signUp2Welcome() {
  // alert("Sign Up to Welcome");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

function showPasswordUp() {
  // alert("Show Password");

  var password = document.getElementById("password");
  var show = document.getElementById("show");

  if (password.type == "password") {
    password.type = "text";
    show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  } else {
    password.type = "password";
    show.innerHTML = "<i class='bi bi-eye-fill'></i>";
  }
}

function signUp() {
  // alert("Sign Up");

  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var mobile = document.getElementById("mobile").value;
  var country = document.getElementById("country").value;
  var gender = document.getElementById("gender").value;

  // alert (fname+" : "+lname+" : "+email+" : "+password+" : "+mobile+" : "+country+" : "+gender);

  var form = new FormData();

  form.append("fname", fname);
  form.append("lname", lname);
  form.append("email", email);
  form.append("password", password);
  form.append("mobile", mobile);
  form.append("country", country);
  form.append("gender", gender);

  var alertDiv = document.getElementById("alertDiv1");
  var msgDiv = document.getElementById("msgDiv1");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert (response);
      if (response == "success") {
        signUpBox.classList.toggle("d-none");
        signInBox.classList.toggle("d-none");
      } else {
        // alert(response);
        alertDiv.classList.remove("d-none");
        msgDiv.innerHTML = response;
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(form);
}

//
//////////////////////////////////////////////////////   Sign In   //////////////////////////////////////////////////////////
//

function showSignIn() {
  // alert("Show Sign In");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");
}

function signIn2Welcome() {
  // alert("Sign In to Welcome");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  signInBox.classList.toggle("d-none");
}

function showPasswordIn() {
  // alert("Show Password");

  var password = document.getElementById("passwordIn");
  var show = document.getElementById("showIn");

  if (password.type == "password") {
    password.type = "text";
    show.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    password.type = "password";
    show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

//
// Forgot Password User Modal
//

var bootstrapUserModal;
function forgotUserPassword() {
  // alert("Forgot User Password");

  var email = document.getElementById("username").value;
  // alert(email);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert(response);
      if (response == "success") {
        alert(
          "Verification code has sent to your email. Please check your inbox"
        );
        var userModal = document.getElementById("forgotPasswordUserModal");
        bootstrapUserModal = new bootstrap.Modal(userModal);
        bootstrapUserModal.show();
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "forgotPasswordProcess.php?e=" + email, true);
  request.send();
}

function showPasswordUN() {
  // alert("Show New Password User")

  var password = document.getElementById("unpi");
  var show = document.getElementById("unpb");

  if (password.type == "password") {
    password.type = "text";
    show.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    password.type = "password";
    show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

function showPasswordUR() {
  // alert("Show Re-Type Password User")

  var password = document.getElementById("urnpi");
  var show = document.getElementById("urnpb");

  if (password.type == "password") {
    password.type = "text";
    show.innerHTML = "<i class='bi bi-eye-fill'></i>";
  } else {
    password.type = "password";
    show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
  }
}

function checkPasswordUser() {
  // alert("Check Password");

  var password1 = document.getElementById("unpi");
  var password2 = document.getElementById("urnpi");

  var alertDiv = document.getElementById("alertDiv5");
  var msgDiv = document.getElementById("msgDiv5");

  if (password1.value.length > 4 && password2.value.length < 31) {
    if (password1.value == password2.value) {
      password1.disabled = true;
      password2.disabled = true;
      alertDiv.classList.remove("d-none");
      msgDiv.innerHTML =
        '<i class="bi bi-check fs-4"></i> Passwords are matching successfully. Enter your Verification Code or <span onclick="editUser();" class="link-light fs-5 cursor-pointer">Edit Passwords</span>';
    }
  }
}

function editUser() {
  // alert("Edit Passwords");

  document.getElementById("alertDiv5").classList.add("d-none");
  document.getElementById("unpi").disabled = false;
  document.getElementById("urnpi").disabled = false;
}

function resetUserPassword() {
  // alert("Reset User Password");

  var email = document.getElementById("username").value;
  var password1 = document.getElementById("unpi").value;
  var password2 = document.getElementById("urnpi").value;
  var vcode = document.getElementById("verificationCodeUser").value;
  var password = document.getElementById("passwordIn").value;
  // alert(email+" : "+password1+" : "+password2+" : "+vcode+" : "+password);

  var form = new FormData();

  form.append("email", email);
  form.append("password", password1);
  form.append("check", password2);
  form.append("vcode", vcode);

  var alertDiv = document.getElementById("alertDiv4");
  var msgDiv = document.getElementById("msgDiv4");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert(response);
      if (response == "success") {
        bootstrapUserModal.hide();
        password.value = "";
        password.placeholder = "Enter your New Password";
        alertDiv.classList.add("d-none");
        alert("Password reseted successfully");
      } else {
        // alert (response);
        alertDiv.classList.remove("d-none");
        msgDiv.innerHTML = response;
      }
    }
  };

  request.open("POST", "resetPasswordProcess.php", true);
  request.send(form);
}

function signIn() {
  // alert("Sign In");

  var username = document.getElementById("username").value;
  var password = document.getElementById("passwordIn").value;
  var remember = document.getElementById("rememberMe").checked;

  // alert(username + " : " + password + " : " + remember.checked);

  var form = new FormData();

  form.append("username", username);
  form.append("password", password);
  form.append("remember", remember);

  var alertDiv = document.getElementById("alertDiv2");
  var msgDiv = document.getElementById("msgDiv2");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert(response);
      if (response == "success") {
        window.location = "home.php";
      } else {
        alertDiv.classList.remove("d-none");
        msgDiv.innerHTML = response;
      }
    }
  };

  request.open("POST", "signInProcess.php", true);
  request.send(form);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////   Admin   ///////////////////////////////////////////////////////////

//
//

function showAdminSignIn() {
  // alert("Show Admin Sign In");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  adminSignInBox.classList.toggle("d-none");
}

function back2WelcomeAdmin() {
  // alert("Back to Welcome");

  var navigator = document.getElementById("navigator");
  navigator.classList.toggle("d-none");
  adminSignInBox.classList.toggle("d-none");
}

// function showAdminPassword() {
//   // alert("Show Password");

//   var password = document.getElementById("passwordAdmin");
//   var show = document.getElementById("showAdmin");

//   if (password.type == "password") {
//     password.type = "text";
//     show.innerHTML = "<i class='bi bi-eye-fill'></i>";
//   } else {
//     password.type = "password";
//     show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
//   }
// }

function sendVerificationAdmin() {
  // alert ("Send Verification Admin");

  var email = document.getElementById("admin");
  var mobile = document.getElementById("mobileAdmin");
  // alert(email);

  var field = document.getElementById("adminField");
  var btn = document.getElementById("adminbtn");
  var vcode = document.getElementById("vcode");
  var send = document.getElementById("sendbtn");

  var alertDiv = document.getElementById("alertDiv3");
  var msgDiv = document.getElementById("msgDiv3");

  // var vcodeDiv = document.getElementById("vcodeDiv");
  // var titleDiv = document.getElementById("titleDiv");

  var form = new FormData();
  form.append("email", email.value);
  form.append("mobile", mobile.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert(response);
      if (response == "success") {
        var msg = "Verification Code Send Successfully. Check your inbox.";

        email.disabled = true;
        mobile.disabled = true;
        vcode.disabled = false;

        field.classList.add("d-none");
        btn.classList.remove("d-none");

        send.innerHTML = "<i class='bi bi-send-fill'></i> ReSend";
        vcode.placeholder = msg;

        alertDiv.classList.add("d-none");
        vcode.value = "";

        // vcodeDiv.classList.add("mb-lg-5 mt-lg-2");
        // titleDiv.classList.add("mb-lg-3 mt-lg-3");

        // msgDiv.innerHTML = msg;
      } else {
        // alert(response);
        field.classList.remove("d-none");
        btn.classList.add("d-none");

        alertDiv.classList.remove("d-none");
        msgDiv.innerHTML = response;
      }
    }
  };

  request.open("POST", "sendVerificationAdminProcess.php", true);
  request.send(form);
}

//
// Forgot Password Admin Modal
//

// var bootstrapAdminModal;
// function forgotAdminPassword() {
//   // alert("Forgot Admin Password");

//   var email = document.getElementById("admin").value;
//   // alert(email);

//   var request = new XMLHttpRequest();

//   request.onreadystatechange = function () {
//     if (request.readyState == 4 & request.status == 200 & request.status == 200) {
//       var response = request.responseText;
//       // alert(response);
//       if (response == "success") {
//         alert(
//           "Verification code has sent to your email. Please check your inbox"
//         );
//   var adminModal = document.getElementById("forgotPasswordAdminModal");
//   bootstrapAdminModal = new bootstrap.Modal(adminModal);
//   bootstrapAdminModal.show();
//       } else {
//         alert(response);
//       }
//     }
//   };

//   request.open("GET", "forgotAdminPasswordProcess.php?e=" + email, true);
//   request.send();
// }

// function showPasswordAN() {
//   // alert("Show New Password Admin")

//   var password = document.getElementById("anpi");
//   var show = document.getElementById("anpb");

//   if (password.type == "password") {
//     password.type = "text";
//     show.innerHTML = "<i class='bi bi-eye-fill'></i>";
//   } else {
//     password.type = "password";
//     show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
//   }
// }

// function showPasswordAR() {
//   // alert("Show Re-Type Password Admin")

//   var password = document.getElementById("arnpi");
//   var show = document.getElementById("arnpb");

//   if (password.type == "password") {
//     password.type = "text";
//     show.innerHTML = "<i class='bi bi-eye-fill'></i>";
//   } else {
//     password.type = "password";
//     show.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
//   }
// }

// function checkPasswordAdmin() {
//   // alert("Check Password");

//   var password1 = document.getElementById("anpi");
//   var password2 = document.getElementById("arnpi");

//   var alertDiv = document.getElementById("alertDiv7");
//   var msgDiv = document.getElementById("msgDiv7");

//   if (password1.value.length > 4 && password2.value.length < 31) {
//     if (password1.value == password2.value) {
//       password1.disabled = true;
//       password2.disabled = true;
//       alertDiv.classList.remove("d-none");
//       msgDiv.innerHTML =
//         '<i class="bi bi-check fs-4"></i> Passwords are matching successfully. Enter your Verification Code or <span onclick="editAdmin();" class="link-light fs-5 cursor-pointer">Edit Passwords</span>';
//     }
//   }
// }

// function editAdmin() {
//   // alert("Edit Passwords");

//   document.getElementById("alertDiv7").classList.add("d-none");
//   document.getElementById("anpi").disabled = false;
//   document.getElementById("arnpi").disabled = false;
// }

// function resetAdminPassword() {
//   // alert("Reset Admin Password");

//   var email = document.getElementById("admin").value;
//   var password1 = document.getElementById("anpi").value;
//   var password2 = document.getElementById("arnpi").value;
//   var vcode = document.getElementById("verificationCodeAdmin").value;
//   var password = document.getElementById("passwordAdmin").value;
//   // alert(email+" : "+password1+" : "+password2+" : "+vcode+" : "+password);

//   var form = new FormData();

//   form.append("email", email);
//   form.append("password", password1);
//   form.append("check", password2);
//   form.append("vcode", vcode);

//   var alertDiv = document.getElementById("alertDiv4");
//   var msgDiv = document.getElementById("msgDiv4");

//   var request = new XMLHttpRequest();

//   request.onreadystatechange = function () {
//     if (request.readyState == 4 & request.status == 200 & request.status == 200) {
//       var response = request.responseText;
//       // alert(response);
//       if (response == "success") {
//         bootstrapAdminModal.hide();
//         password.value = "";
//         password.placeholder = "Enter your New Password";
//         alertDiv.classList.add("d-none");
//         alert("Password reseted successfully");
//       } else {
//         // alert (response);
//         alertDiv.classList.remove("d-none");
//         msgDiv.innerHTML = response;
//       }
//     }
//   };

//   request.open("POST", "resetAdminPasswordProcess.php", true);
//   request.send(form);
// }

function adminSignIn() {
  // alert("Admin Sign In");

  var vcode = document.getElementById("vcode").value;
  var email = document.getElementById("admin").value;
  // alert(vcode);

  var alertDiv = document.getElementById("alertDiv3");
  var msgDiv = document.getElementById("msgDiv3");

  var form = new FormData();

  form.append("email", email);
  form.append("vcode", vcode);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert (response);
      if (response == "success") {
        window.location = "adminPanel.php";
      } else {
        // alert(response);
        alertDiv.classList.remove("d-none");
        msgDiv.innerHTML = response;
      }
    }
  };

  request.open("POST", "adminSignInProcess.php", true);
  request.send(form);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////   Guest   //////////////////////////////////////////////////////////

//
//

function visitAsGuest() {
  // alert("Visit as a Guest");

  window.location = "home.php";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Support   //////////////////////////////////////////////////////////

//
//

var bootstrapSupportModal;
function support() {
  // alert("Support");

  var modal = document.getElementById("supportModal");
  bootstrapSupportModal = new bootstrap.Modal(modal);
  bootstrapSupportModal.show();
}

function setAdminMail(email) {
  // alert("Set Admin Mail");
  // alert(email);

  document.getElementById("amail").value = email;

  document.getElementById("title").innerHTML =
    "Contact Admin &nbsp; : &nbsp; <i class='text-warning fs-5'>" +
    email +
    "</i>";
}

function sendSupportMsg() {
  // alert("Send Support Message");

  var admin = document.getElementById("amail").value;
  var email = document.getElementById("umail").value;
  var subject = document.getElementById("subject").value;
  var content = document.getElementById("content").value;

  // alert(to + " : " + email + " : " + subject + " : " + content);

  var form = new FormData();

  form.append("email", email);
  form.append("subject", subject);
  form.append("content", content);
  form.append("admin", admin);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (
      (request.readyState == 4) &
      (request.status == 200) &
      (request.status == 200)
    ) {
      var response = request.responseText;
      // alert(response);
      if (response == "success") {
        bootstrapSupportModal.hide();
        alert(
          "Request sent successfully. Check your email for a reply. This process may take 1 ~ 2 bussiness days"
        );
      } else if (response == "user success") {
        bootstrapSupportModal.hide();
        alert(
          "Support request sent successfully. Check your Message section for a reply. This process may take sometime"
        );
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "sendSupportMsgProcess.php", true);
  request.send(form);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
// Intro Animation
//

var z = 0;
var animId;
function intro() {
  // alert("Intro");
  var containBox = document.getElementById("containBox");
  animId = setInterval(animation, 1);
  containBox.style.opacity = z;
}
function animation() {
  // alert("Animation");
  z += 0.002;
  var containBox = document.getElementById("containBox");
  containBox.style.opacity = z;
  if (z > 1) {
    clearInterval(animId);
    containBox.style.marginTop = "1";
  }
}

// function alert() {

//   var request = new XMLHttpRequest();

//   request.onreadystatechange = function () {
// //    if (request.readyState == 4) {
// if (request.readyState == 4 & request.status == 200) {
//       var response = request.responseText;
//       alert(response);
//     }
//   }

//   request.open("GET","connection.php",true);
//   request.send();
// }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////   Entrance END   ///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Profile   //////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

function viewProfile() {
  // alert("View Profile");

  window.location = "userProfile.php";
}

function changeProfileImage() {
  // alert("Change Profile Image");

  var view = document.getElementById("viewImg");
  var file = document.getElementById("profileImg");

  file.onchange = function () {
    var file1 = this.files[0];
    var url = window.URL.createObjectURL(file1);
    view.src = url;
  };
}

function updateProfile() {
  // alert("Update Profile");

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var country = document.getElementById("country");
  var province = document.getElementById("province");
  var district = document.getElementById("district");
  var city = document.getElementById("city");
  var pcode = document.getElementById("pcode");
  var image = document.getElementById("profileImg");

  // alert (fname.value+" : "+lname.value+" : "+mobile.value+" : "+line1.value+" : "+line2.value+" : "+country.value+" : "+province.value+" : "+district.value+" : "+city.value+" : "+pcode.value);

  var form = new FormData();

  form.append("fname", fname.value);
  form.append("lname", lname.value);
  form.append("mobile", mobile.value);
  form.append("line1", line1.value);
  form.append("line2", line2.value);
  form.append("country", country.value);
  form.append("province", province.value);
  form.append("district", district.value);
  form.append("city", city.value);
  form.append("pcode", pcode.value);

  if (image.files.length == 0) {
    var confirmation = confirm(
      "Are you sure, You don't want to update Profile Image?"
    );

    if (!confirmation) {
      alert("You have not selected any Image !! Please Select an Image ..");
    }
    if (confirmation) {
      alert("Profile Image Skipped");
    }
  } else {
    form.append("image", image.files[0]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    //    if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);
      if (response == "Profile Update Success") {
        alert(response);
        window.location.reload();
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "updateProfileProcess.php", true);
  request.send(form);
}

function signOut() {
  // alert("Sign Out");

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    //    if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);
      if (response == "user") {
        window.location.reload();
      } else if (response == "admin") {
        window.location = "index.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("GET", "signOutProcess.php", true);
  request.send();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////   Profile END   ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Search   ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

function basicSearch(x) {
  // alert("Basic Search");
  // alert(x);

  var txt = document.getElementById("basicSearchtxt");
  var cat = document.getElementById("basicSearchcategory");

  var resulBody1 = document.getElementById("result-body-1");
  var resulBody2 = document.getElementById("result-body-2");

  resulBody1.classList.toggle("d-none");
  resulBody2.classList.toggle("d-none");
}

function advancedSearch(x) {
  // alert("Advanced Search");
  // alert(x);

  var resulBody1 = document.getElementById("result-body-1");
  var resulBody2 = document.getElementById("result-body-2");

  resulBody1.classList.toggle("d-none");
  resulBody2.classList.toggle("d-none");
}

function homeSearch() {
  alert("Home Search");

  window.location.reload();
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Search END   ///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////   Product   /////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

//
// Add, Update & Delete
//

function addProduct() {
  // alert("Add Product");

  window.location = "addProduct.php";
}

function saveProduct() {
  alert("Product Save");

  window.location = "myProducts.php";
}

function changeProductImages() {
  alert("Upload Product Images");
}

function updateProduct() {
  // alert("Update Product");

  window.location = "updateProduct.php";
}

function productUpdate() {
  // alert("Product Update");

  window.location = "myProducts.php";
}

function deleteProduct() {
  // alert("Delete Product");

  var confirmation = confirm("Are you sure, You want to delete this Product?");

  if (confirmation) {
    alert("Product Delete Success !!");
    window.location.reload();
  }
}

//
// View
//

function viewProduct(id) {
  // alert("View Product");
  // alert(id);

  window.location = "singleProductView.php?id=" + id;
}

/*
 * payhere
 */

// function payNow(email) {
//   // alert("Pay Now");
//   // alert(email);

//   var request = new XMLHttpRequest();

//   request.onreadystatechange = function () {
//     // if (request.readyState == 4) {
//     if ((request.readyState == 4) & (request.status == 200)) {
//       var response = request.responseText;
//       //alert (response);

//       var obj = JSON.parse(response);

//       var mail = obj["mail"];
//       var amount = obj["amount"];
//       if (response == "1") {
//         alert("Please Login or Sign Up");
//         window.location = "index.php";
//       } else if (response == "2") {
//         alert("Something went wrong");
//         window.location.reload();
//       } else if (response == "3") {
//         alert(
//           "Couldn't find the User Address. Please update your adress details"
//         );
//         window.location = "userProfile.php";
//       } else if (response == "4") {
//         alert("You have been already Paid.");
//         window.location.reload();
//       } else {
//         // Payment completed. It can be a successful failure.
//         payhere.onCompleted = function onCompleted(orderId) {
//           payComplete(mail);
//           console.log("Payment completed.");
//           // Note: validate the payment and show success or failure page to the customer
//         };

//         // Payment window closed
//         payhere.onDismissed = function onDismissed() {
//           // Note: Prompt user to pay again or show an error page
//           console.log("Payment dismissed");
//         };

//         // Error occurred
//         payhere.onError = function onError(error) {
//           // Note: show an error page
//           console.log("Error:" + error);
//         };

//         // Put the payment variables here
//         var payment = {
//           sandbox: true,
//           merchant_id: "1221502", // Replace your Merchant ID
//           return_url: "http://localhost/horizon/home.php", // Important
//           cancel_url: "http://localhost/horizon/home.php", // Important
//           notify_url: "http://sample.com/notify",
//           order_id: obj["id"],
//           items: obj["item"],
//           amount: amount,
//           currency: "LKR",
//           first_name: obj["fname"],
//           last_name: obj["lanme"],
//           email: mail,
//           phone: obj["mobile"],
//           address: obj["address"],
//           city: obj["city"],
//           country: "Sri Lanka",
//           custom_1: "",
//           custom_2: "",
//         };

//         // Show the payhere.js popup, when "PayHere Pay" is clicked
//         // document.getElementById("payhere-payment").onclick = function (e) {
//         payhere.startPayment(payment);
//         // };
//       }
//     }
//   };

//   request.open("GET", "payNowProcess.php?e=" + email, true);
//   request.send();
// }

/*
 * custom payment modal
 */

var bm;
function payModelOpen() {
  var m = document.getElementById("paymentGetwayModel");
  bm = new bootstrap.Modal(m);
  bm.show();
}

function payNow(email) {
  // alert("Pay Now");
  // alert(email);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    // if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //alert (response);

      var obj = JSON.parse(response);

      var mail = obj["mail"];
      var amount = obj["amount"];
      if (response == "1") {
        alert("Please Login or Sign Up");
        window.location = "index.php";
      } else if (response == "2") {
        alert("Something went wrong");
        window.location.reload();
      } else if (response == "3") {
        alert(
          "Couldn't find the User Address. Please update your adress details"
        );
        window.location = "userProfile.php";
      } else if (response == "4") {
        alert("You have been already Paid.");
        window.location.reload();
      } else {
        // Payment completed.
        payComplete(mail);
      }
    }
  };

  request.open("GET", "payNowProcess.php?e=" + email, true);
  request.send();
}

function payComplete(mail) {
  // alert("Pay Complete");
  // alert(mail);

  var form = new FormData();

  form.append("mail", mail);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    // if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert (response);
      if (response == "1") {
        bm.hide();
        alert("Payment has been completed");
        window.location = "home.php";
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "payCompleteProcess.php", true);
  request.send(form);
}

/*
 * Play
 */

function playVersion(vid) {
  // alert("Play Version");
  // alert(vid);

  var playerDiv = document.getElementById("playerDiv");
  var player = document.getElementById("player");
  var video = document.getElementById("video");

  var jsObj = { version_id: vid };
  var json = JSON.stringify(jsObj);

  var form = new FormData();
  form.append("json", json);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      // var response = request.responseText.split("-"); // Split the response
      if (request.status == 200) {
        var responseObj = JSON.parse(response);
        if (responseObj.result == "success") {
          playerDiv.classList.remove("d-none");
          // alert(responseObj.video);
          player.src = responseObj.video;
          video.load();
        } else {
          alert(responseObj.result);
          playerDiv.classList.add("d-none");
        }
      } else {
        playerDiv.classList.add("d-none");
        alert(response);
      }
    }
  };

  request.open("POST", "loadVideo.php", true);
  request.send(form);
}

//
// Cart
//

// function addToCart(x) {
//   alert("Add To Cart");
//   alert(x);
// }

// function removeFromCart(id) {
//   alert("Remove From Cart");
//   alert(id);

//   window.location.reload();
// }

// function cartSearch(x) {
//   // alert("Cart Search");
//   // alert(x);

//   var empty = document.getElementById("emptyCart");
//   var haveProduct = document.getElementById("haveProduct");
//   var haveSummary = document.getElementById("haveSummary");

//   empty.classList.toggle("d-none");
//   haveProduct.classList.toggle("d-none");
//   haveSummary.classList.toggle("d-none");
// }

function payOut() {
  // alert("Pay Out");

  alert("Purchased Successfully");
  window.location = "invoice.php";
}

//
// Watchlist
//

function addToWatchList(id) {
  // alert("Add To Watch List");
  // alert(id);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      if (request.status == 200) {
        if (response == "success") {
          window.location.reload();
          alert("Added to Watchlist.");
        } else if (response == "Please Sign in or Register") {
          alert(response);
          window.location = "index.php";
        } else {
          alert(response);
        }
      } else {
        console.log(response);
      }
    }
  };
  request.open("GET", "controllers/addToWatchList.php?id=" + id);
  request.send();
}

function removeFromWatchList(watchlist_id) {
  // alert("Remove From Watch List");
  // alert(watchlist_id);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      if (request.status == 200) {
        if (response == "success") {
          window.location.reload();
        } else {
          alert(response);
        }
      } else {
        console.log(response);
      }
    }
  };

  request.open(
    "GET",
    "controllers/removeFromWatchlist.php?id=" + watchlist_id,
    true
  );
  request.send();
}

function watchListSearch(x) {
  // alert("Watch List Search");
  // alert(x);
  // var empty = document.getElementById("emptyView");
  // var have = document.getElementById("haveProduct");
  // empty.classList.toggle("d-none");
  // have.classList.toggle("d-none");
}

//
// Recent
//

function addToWatchList(id) {
  // alert("Add To Watch List");
  // alert(id);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      if (request.status != 200) {
        console.log(response);
      }
    }
  };
  request.open("GET", "controllers/addToRecent.php?id=" + id);
  request.send();
}

function removeFromRecent(recent_id) {
  // alert("Remove From Watch List");
  // alert(watchlist_id);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var response = request.responseText;
      if (request.status == 200) {
        if (response == "success") {
          window.location.reload();
        } else {
          alert(response);
        }
      } else {
        console.log(response);
      }
    }
  };

  request.open("GET", "removeFromRecent.php?id=" + recent_id, true);
  request.send();
}

function recentSearch(x) {
  // alert("Watch List Search");
  // alert(x);
  // var empty = document.getElementById("emptyView");
  // var have = document.getElementById("haveProduct");
  // empty.classList.toggle("d-none");
  // have.classList.toggle("d-none");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////   Product END   ///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////   Seller Store   ///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

//
// Sorting
//

function sort1(x) {
  alert("Sort 01");
  alert(x);

  window.location.reload();
}

function clearSort1() {
  // alert("Clear Sort 01");

  document.getElementById("search").value = "";
  document.getElementById("h").checked = false;
  document.getElementById("l").checked = false;
  document.getElementById("n").checked = false;
  document.getElementById("o").checked = false;
  document.getElementById("b").checked = false;
  document.getElementById("u").checked = false;
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////   Seller Store END   /////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////   Invoice & Purchase History   ///////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

//
// Invoice
//

function print() {
  alert("Print");
}

function exportPDF() {
  alert("Export as PDF");
}

//
// Purchase History
//

function feedback() {
  alert("Feedback");
}

function deleteHistory() {
  alert("Delete History");
}

function deleteAllHistory() {
  alert("Delete All History");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////   Invoice & Purchase History   ///////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////   Messages   /////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

function searchChat(email) {
  // alert("Search Chat User");
  // alert(email);

  var txt = document.getElementById("txt");
  var btn = document.getElementById("btn");
  // var btn2 = document.getElementById("btn2");

  // btn2.onclick = function () {
  //   txt.focus();
  //   if (loadChat_id > 0) {
  //     clearInterval(loadChat_id);
  //   }
  //   btn.innerHTML = '<i class="bi bi-arrow-left text-success"></i>';
  // };

  txt.focus();
  btn.innerHTML = '<i class="bi bi-arrow-left text-success"></i>';

  btn.onclick = function () {
    if (btn.innerHTML == '<i class="bi bi-arrow-left text-success"></i>') {
      txt.blur();
      txt.value = "";
      btn.innerHTML = '<i class="bi bi-search text-success"></i>';
    } else if (btn.innerHTML == '<i class="bi bi-search text-success"></i>') {
      txt.focus();
      btn.innerHTML = '<i class="bi bi-arrow-left text-success"></i>';
    }
  };

  txt.onblur = function () {
    txt.value = "";
    btn.innerHTML = '<i class="bi bi-search text-success"></i>';

    var form = new FormData();
    form.append("txt", txt.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      //    if (request.readyState == 4) {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        // alert(response);
        if (response == "empty") {
          loadChat(email);
        } else {
          chatDiv.innerHTML = response;
        }
      }
    };

    request.open("POST", "searchChatProcess.php", true);
    request.send(form);
  };

  txt.onkeyup = function () {
    // alert(txt.value);

    if (loadChat_id > 0) {
      clearInterval(loadChat_id);
    }

    var form = new FormData();
    form.append("txt", txt.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      //    if (request.readyState == 4) {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        // alert(response);
        if (response == "empty") {
          loadChat(email);
        } else {
          chatDiv.innerHTML = response;
        }
      }
    };

    request.open("POST", "searchChatProcess.php", true);
    request.send(form);
  };
}

var loadChat_id = 0;
function loadChat(email) {
  // alert("Load Chats");
  // alert(email);

  var chatDiv = document.getElementById("chatDiv");

  var form = new FormData();
  form.append("email", email);

  if (loadChat_id > 0) {
    clearInterval(loadChat_id);
  }

  var msgCount = 0;
  loadChat_id = setInterval(function () {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4) {
        var response = request.responseText;
        // alert(response);
        // console.log(response);
        if (request.status == 200) {
          var obj = JSON.parse(response);
          if (obj.result == "success") {
            if (msgCount == 0) {
              msgCount = obj.count;
              chatDiv.innerHTML = obj.content;
            } else if (msgCount != obj.count) {
              msgCount = obj.count;
              chatDiv.innerHTML = obj.content;
            }
          } else {
            alert(obj.result);
          }
        } else {
          // alert(response);
          console.log(response);
        }
      }
    };

    request.open("POST", "loadChatProcess.php", true);
    request.send(form);
  }, 1 * 100);
}

function backToChat() {
  // alert("Back to Chat");

  var chatBox = document.getElementById("chatBox");
  var emptyBox = document.getElementById("emptyBox");

  if (openChat_id > 0) {
    clearInterval(openChat_id);
  }

  chatBox.classList.add("d-none");
  emptyBox.classList.remove("d-none");
}

var openChat_id = 0;
function openChat(email, chat_id) {
  // alert("Open Chat");
  // alert(email);
  // alert(chat_id);

  var chatBox = document.getElementById("chatBox");
  var emptyBox = document.getElementById("emptyBox");

  chatBox.innerHTML = "";

  var form = new FormData();
  form.append("email", email);

  if (openChat_id > 0) {
    clearInterval(openChat_id);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    //    if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);
      loadChatBody(email, chat_id);
      chatBox.innerHTML = response;
      chatBox.classList.remove("d-none");
      emptyBox.classList.add("d-none");
    }
  };

  request.open("POST", "openChatProcess.php", true);
  request.send(form);
}

function loadChatBody(email, chat_id) {
  // alert("Chat Body Load");
  // alert(email);
  // alert(chat_id);

  var chatContent = document.getElementById("chatContents");
  //var chatContent = document.getElementById("chatContents").innerHTML;

  var form = new FormData();
  form.append("email", email);
  form.append("c_id", chat_id);

  var msgCount = 0;
  openChat_id = setInterval(function () {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      // if ((request.readyState == 4) & (request.status == 200)) {
      if (request.readyState == 4) {
        var response = request.responseText;
        // alert(response);
        if (request.status == 200) {
          //chatContent.innerHTML = "Hei";
          document.getElementById("chatContents").innerHTML = "Hei";
          var obj = JSON.parse(response);
          if (obj.result == "success") {
            // alert(msgCount);
            // alert(obj.content);
            if (msgCount == 0) {
              // alert("1");
              msgCount = obj.count;
              // chatContent.innerHTML = obj.content;
              document.getElementById("chatContents").innerHTML = obj.content;
            } else if (msgCount != obj.count) {
              // alert("2");
              msgCount = obj.count;
              // chatContent.innerHTML = obj.content;
              document.getElementById("chatContents").innerHTML = obj.content;
            }
          } else {
            alert(obj.result);
          }
        } else {
          console.log(response);
          // alert(response);
        }
      }
    };

    request.open("POST", "LoadChatBodyProcess.php", true);
    request.send(form);
  }, 1000);
}

function viewChat() {
  // alert("View Chat");

  var type = document.getElementById("typing");
  var box = document.getElementById("typeDiv");
  var txt = document.getElementById("msgtxt");
  var attach = document.getElementById("attach");

  type.classList.add("d-flex");
  type.classList.add("flex-column");
  type.classList.remove("d-block");

  attach.onchange = function () {
    var file_count = attach.files.length;

    if (file_count <= 4) {
      for (var x = 0; x < file_count; x++) {
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        var img = document.createElement("img");
        img.id = "img" + x;
        img.className = "img-fluid p-1";
        img.style.maxHeight = "250px";
        img.style.minHeight = "200px";
        // img.style.width = "100%";
        img.src = url;

        type.appendChild(img);
        type.classList.remove("d-flex");
        type.classList.remove("flex-column");
        type.classList.add("d-block");
        box.classList.remove("d-none");
      }
    } else {
      alert("Select less than 3 files at a time");
    }
  };

  txt.onkeyup = function () {
    box.classList.remove("d-none");
    type.innerHTML = txt.innerHTML;

    if (txt.innerHTML == "") {
      box.classList.add("d-none");
      type.innerHTML = "";
    }
    if (txt.innerHTML == " ") {
      box.classList.add("d-none");
      type.innerHTML = "";
    }
  };

  box.classList.remove("d-none");
  type.innerHTML = txt.innerHTML;

  if (txt.innerHTML == "") {
    box.classList.add("d-none");
    type.innerHTML = "";
  }
  if (txt.innerHTML == " ") {
    box.classList.add("d-none");
    type.innerHTML = "";
  }
}

function sendMsg(rmail, smail) {
  // alert("Send Message");

  var attach = document.getElementById("attach");
  var txt = document.getElementById("msgtxt");
  var box = document.getElementById("typeDiv");
  var type = document.getElementById("typing");

  var form = new FormData();
  form.append("rmail", rmail);
  form.append("smail", smail);
  form.append("txt", txt.innerHTML);

  var file_count = attach.files.length;
  if (file_count > 0) {
    for (var x = 0; x < file_count; x++) {
      var file = attach.files[x];
      form.append("img" + x, file);
    }
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    //    if (request.readyState == 4) {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);
      if (response == "txt success") {
        txt.innerHTML = "";
        type.innerHTML = null;
        box.classList.add("d-none");
      } else if (response == "attach success") {
        attach.value = null;
        type.innerHTML = null;
        box.classList.add("d-none");
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "sendMsgProcess.php", true);
  request.send(form);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////   Messages END   ////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////   Admin   ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//
//

//
// Panel
//

function panelSearch() {
  alert("Panel Search");

  window.location.reload();
}

//
// Manage Products
//

function manageProduct(x) {
  alert("Manage Product");
  // alert(x);

  // window.location = "manageProductView.php";
}

function listAllProducts() {
  // alert("List All Products");

  var newP = document.getElementById("newProducts");
  var allP = document.getElementById("allProducts");

  newP.classList.toggle("d-none");
  allP.classList.toggle("d-none");
}

//
// Manage Users
//

function listAllUsers() {
  // alert("List All Users");

  var newU = document.getElementById("newUsers");
  var allU = document.getElementById("allUsers");

  newU.classList.toggle("d-none");
  allU.classList.toggle("d-none");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////   Admin END   ///////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
