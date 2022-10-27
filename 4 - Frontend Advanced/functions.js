// ===================== Functions

// eligible student (above 22 years old)
// will recieve welcoming email
// will add to eligible students sheet

// uneligible student
// will recieve regret email
// will add to uneligible sutdents sheet

let studentAge = 22;
if (studentAge >= 22) {
  acceptStudent();
} else {
  rejectStudent();
}

function acceptStudent() {
  // send w. email
  // add to the e. sheet
}

function rejectStudent() {
  // this is a function
  // send r. email
  // add to the u. sheet
}

function sayHi() {
  console.log("hi");
}

function getGreetings() {
  return "hi";
}

function sum() {
  return 1 + 1;
}

function printSum() {
  console.log(sum());
}

// Arrays Methods
let arr = [1, 2, 3];
// arr = [1, 2, 3, 4];
let arrObj = {
  name: "Khalid",
  age: 20,
  speak: function () {
    // this is a method
    console.log("This is Khalid!");
  },
};

// User Defined Functions
function addTo(a, b) {
  return a + b;
}
