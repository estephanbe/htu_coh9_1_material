// ======== ES6 Demo =========

// old syntax
setTimeout(function (x, y, z) {
    console.log(x)
}, 5000);

// ES6 syntax
setTimeout((x, y, z) => {
    console.log(x)
}, 5000);

// old syntax
setTimeout(function () {
    console.log(1)
}, 5000);

//ES6 syntax
setTimeout(() => console.log(1), timeout);

// old way to define functions
function testFunction1() {
    console.log(1)
}

// ES6 way to define functions
const testFunction2 = () => {
    console.log(1);
}

// Conactination ***

// old syntax
let name = "Mike"
let a = "hi " + testName; // => hi Mike

// ES6 syntax (backticks)
a = `hi ${testName}`; // => hi Mike
a = `hi ${2 * 2}`; // => hi 4