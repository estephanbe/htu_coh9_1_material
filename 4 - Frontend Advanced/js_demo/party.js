// Security gaurde
// Check queue of people, if person is older than 18 and younger than 35, admit. Otherwise, appologize.

// write variables to contain the limitations of the age.
const minAge = 18;
const maxAge = 35;
let age;
// let userName;

function displayMsg(msg) {
  alert(msg);
}

// we will loop through the queue.
do {
  age = prompt("What is your age?");
  age = Number.parseInt(age);

  // if current person is younger than 18, will print (you are too young)
  if (age < minAge) {
    displayMsg("You are too young");
  } else if (age > maxAge) {
    // if older than 35, will print (you are too old)
    displayMsg("You are too old");
  } else {
    // if between 18 and 35, ask for the user name, and welcome the user by his/her name.
    // userName = prompt("What is your name?");
    displayMsg(
      "Hi " + prompt("What is your name?") + ", welcome to the party!"
    );
  }
} while (confirm("Is there anyone else?"));
