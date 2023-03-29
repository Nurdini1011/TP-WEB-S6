Students = [
    { name : 'A', age : 18 },
    { name : 'B', age : 20 },
    { name : 'C', age : 14 },
]

const initial = 0;
const moyen = Students.reduce((initial, person) => {
    somme = initial + person.age;
    return somme/Students.length;
}, initial);

console.log(moyen);

const array1 = [10, 15, 6];

// Pass a function to map
const map1 = array1.map(x => x * 2);

console.log(map1);
// Expected output: Array [2, 8, 18, 32]

