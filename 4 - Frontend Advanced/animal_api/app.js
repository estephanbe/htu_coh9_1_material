const aName = document.getElementById('a-name');
const aImage = document.getElementById('a-image');
const aDiet = document.getElementById('a-diet');
const aList = document.getElementById('a-list');
const aRefresh = document.getElementById('aRefresh');

const apiUrl = 'https://zoo-animal-api.herokuapp.com/animals/rand';

const animalData = fetch(apiUrl);

animalData
    .then(response => {
        return response.json();
    })
    .then(data => {
        updateCard(data);
    });

function updateCard(animal) {
    aName.textContent = animal.name;
    aImage.src = animal.image_link;
    aDiet.textContent = animal.diet;

    let list = {
        latin_name: animal.latin_name,
        habitat: animal.habitat,
        lifespan: animal.lifespan
    };

    // let liList = [];
    let innerLis = '';

    for (const aKey in list) {
        // liList.push(`<li class="list-group-item">${list[aKey]}</li>`);
        innerLis += `<li class="list-group-item">${list[aKey]}</li>`;
    }
    // liList.push(`<li class="list-group-item">${list.latin_name}</li>`);
    // liList.push(`<li class="list-group-item">${list[habitat]}</li>`);
    // liList.push(`<li class="list-group-item">${list[lifespan]}</li>`);

    aList.innerHTML = innerLis;
}

aRefresh.addEventListener('click', function (e) {
    fetch(apiUrl)
        .then(response => {
            return response.json();
        })
        .then(data => {
            updateCard(data);
        });
});


// Foreach loop
function htuForEach() {
    let arr = [1, 2, 3];
    // for (let index = 0; index < arr.length; index++) {
    //     console.log(arr[index]);
    // }
    arr.forEach(element => {
        console.log(element);
    });
}