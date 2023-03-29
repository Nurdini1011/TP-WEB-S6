const people = [
    { name : 'K', age : 26 },
    { name : 'Q', age : 22 },
    { name : 'Z', age : 43 },
    { name : 'J', age : 43 },
]

const pga = people.reduce((gp, person) => {
    const age = person.age;
    if (gp[age] == null)
        gp[age] = [];

    gp[age].push(person);
    return gp;
}, {});

// pga return 3 groupes de different age 
/* {
    "22": [
      { "name": "Q", "age": 22 }
    ],
    "26": [
      { "name": "K", "age": 26 }
    ],
    "43": [
      { "name": "Z", "age": 43 },
      { "name": "J", "age": 43 }
    ]
}
*/ 
  