const email = "test@test.com";
const password = "123456";

const urlSearchParams = new URLSearchParams(window.location.search);

const providedEmail = urlSearchParams.get("email");
const providedPassword = urlSearchParams.get("password");

if (providedEmail == email && providedPassword == password) {
  // proceed to google.com
  window.location.href = "http://google.com";
} else {
  // if the password is incorrect, print: incorrect passsword
  // if the email is incorrect, print: incorrect email
  alert("incorrect email or password");
}
