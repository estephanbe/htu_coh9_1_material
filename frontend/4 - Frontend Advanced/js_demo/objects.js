let students = [];

// let obj = {
//   name: "khalid",
//   age: 20,
// };
// students.push(obj);

function Person(name, age) {
  this.name = name;
  this.personAge = age;
  this.sayHi = function () {
    console.log("Hi, my name: " + this.name);
  };
  this.changeAge = function (newAge) {
    this.personAge = newAge;
  };
}

function Cars(name) {
  this.name = name;
}

// let ahmad = new Person("ahmad", 23);
let khalid = new Person("khalid", 20);
khalid = {
  name: "khalid",
  age: 20,
};
