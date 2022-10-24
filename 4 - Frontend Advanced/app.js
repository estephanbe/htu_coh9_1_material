let sum = 3;
const pi = 3.149283489723489279423;

// This is how we comment in JS
sum = 3 + 3;
// pi = 34; // We can't do this.

// console.log(sum);
// console.log(pi);

// JS Data Types
let intVar = 2; // integer
let floatVar = 2.5; // float
let stringVar = "Hello World"; // string
let BoolVar = true; // Boolean (true or false)
let objVar = { name: "Ahmad", age: 20 };
let ArrVar = ["Ahmad", 20, 21, 22];
let nullVar = null; // this is an empty variable.
let undefVar = undefined; // has not been assigned a value yet. And usually we write it this way: let undefVar;

let newIntValue = intVar;

// ============================== Mathmatical Operators
// console.log(1 + 1);
let plusOperation = 1 + 1;
let subOperation = 1 - 1;
let MulOperation = 1 * 1;
let divOperation = 1 / 1;
let modOperation = 5 % 2;

let value1 = 1;
// value1 = value1 + 1;
value1++;
// value1 = value1 - 1;
value1--;

// ============================== Assignment operators

let aValue = 1;
// aValue = aValue + 3;
aValue += 3; // 1+3 = 4
aValue -= 2; // 4 - 2 = 2
aValue *= 4; // 2 * 4 = 8;
aValue /= 2; // 8 / 2 = 4;

// ============================== Comparsion operators (Always returns Boolean)
let com1 = 1 > 5; // false
let com2 = 1 < 5; // true
let com3 = 1 >= 5; // false
let com4 = 1 <= 5; // true
let com5 = 1 == 1; // true
let com6 = 1 != 1; // false
let com7 = true == true; // true
let com8 = false == false; // true
let com9 = true != true; // false
let com10 = false != false; // fales

// Going Further..
let doubleEq = 1 == 1; // true
let doubleEqStr = 1 === "1"; // false

let doubleNotEq = 1 != 1; // false
let doubleNotEqStr = 1 !== "1"; // true

// ============================== Logical operators (Always returns Boolean)
let andlogicalOp = true && true; // true
let andlogicalOp2 = true && false; // false
let andlogicalOp3 = false && true; // false
let andlogicalOp4 = false && false; // false

let orlogicalOp = true || false; // true
let orlogicalOp2 = false || true; // true
let orlogicalOp3 = true || true; // true
let orlogicalOp4 = false || false; // false

let notOp = !true; // false
let notOp2 = !false; // true

let studentAge = 22;
let studentMajor = "CS";
let ternaryOp =
  studentAge >= 22 && studentMajor == "CS" ? "Accepted" : "Not Accepted";

// ============================== String operator
let sentence = null;
let gender = "he";
sentence = " is eating";
let finalSentence = gender + sentence;

// ============================== If statement
// if
// else if
// else

// switch: if I have too many else if
studentAge = 22;
switch (studentAge) {
  case 22:
    console.log("You are eligible!");
    break;
  case 21:
    console.log("Try next year");
    break;
  case 20:
    console.log("Try after two years");
    break;

  default:
    console.log("You are not eligible!");
    break;
}

// using if
let today = 1;
if (today == 0) {
  console.log("Sunday");
} else if (today == 1) {
  console.log("Monday");
} else if (today == 2) {
  console.log("Tuesday");
} else if (today == 3) {
  console.log("Wednsday");
} else if (today == 4) {
  console.log("Thursday");
} else if (today == 5) {
  console.log("Friday");
} else if (today == 6) {
  console.log("Saturday");
}

// Using switch
switch (today) {
  case 0:
    day = "Sunday";
    break;
  case 1:
    day = "Monday";
    break;
  case 2:
    day = "Tuesday";
    break;
  case 3:
    day = "Wednesday";
    break;
  case 4:
    day = "Thursday";
    break;
  case 5:
    day = "Friday";
    break;
  case 6:
    day = "Saturday";
}

// Nested if
if (studentAge < 22) {
  if (studentAge > 15) {
    // do something
  } else {
    // do something
  }
}

// ============================== JS Loops

// For loop
let arr = [1, 2, 3];
for (let index = 0; index < arr.length; index++) {
  console.log(arr[index]);
}
// result:
// index = 0 > true > arr[0] (1) > index = 1
// index = 1 > true > arr[1] (2) > index = 2
// index = 2 > true > arr[2] (3) > index = 3
// index = 3 > false > stop excution

// While loop
let counter = 0;
while (counter < 3) {
  counter++;
  console.log("This is from while loop.." + counter);
}
// result:
// counter = 0
// (counter < 3) true > will print.. > counter = 1
// (counter < 3) true > will print.. > counter = 2
// (counter < 3) true > will print.. > counter = 3
// loop will break

// Do..While loop
console.log("==================");
counter = 3;
do {
  counter++;
  console.log("This is from while loop.." + counter);
} while (counter < 3);

console.log("================== Continue");
let arr2 = [1, 2, 3, 4, 5, 6];
for (let index = 0; index < arr2.length; index++) {
  if (arr2[index] % 2 == 0) {
    continue;
  }
  console.log(arr2[index]);
}

console.log("================== Break");
for (let index = 0; index < arr2.length; index++) {
  if (arr2[index] % 2 == 0) {
    break;
  }
  console.log(arr2[index]);
}
