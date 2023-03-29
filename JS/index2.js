var Car = {
    registrationNumber : "GA12345",
    brand : "Toyota",

    // context appartient à cet objet
    displayDetails : function(ownerName) {
        // this est fait reference par cet objet
        console.log(ownerName + ', this is vour car : ' + this.registrationNumber + " " + this.brand);
    }
}

Car.displayDetails('Viviane1'); // Viviane1, this is vour car : GA12345 Toyota
var myCarDetails = Car.displayDetails; 
myCarDetails(); // undefined, this is vour car : undefined undefined car il ne connait pas this fait reference à quoi

// bind
// liée le methode 
var myCarDetails = Car.displayDetails.bind(Car, 'Viviane2');
myCarDetails();

// apply & call
Car.displayDetails.apply(Car, ['Viviane3']); // fournir le context au 1ere
Car.displayDetails.call(Car, 'Viviane4');

'use strict'; // enables strict mode for the entire script
var person = {
    name : "Jack",
    prop : {
        name : "Dantel",
        getName : function() {
            return this.name;
        }
    }
}

var name = person.prop.getName.bind(person);
console.log(name());

var name = person.prop.getName();
console.log(name);

// fermeture-clossure
// proteger variable locale