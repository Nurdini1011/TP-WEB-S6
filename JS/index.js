let Car = function(color, model, makeYear, fuelType){
    this.color = color;
    this.model = model;
    this.fuelType = fuelType;
    this.makeYear = makeYear;
}

Car.prototype.start = function() {
    console.log('started');
}

Car.prototype.stop = function() {
    console.log('stopped');
}

car1 = new Car('Blue', 'A4', 2022, 'Petrol');
car1.start();

// Car dispose un attribut prototype qui 
// pointe sur constructor de Car.prototype

let Tesla = function() {
    this.autoPilotMode = false;
}

let Support = function() {
    this.constuctor = Tesla;
}

// change le prototype de Support qui pointe directement vers Car.prototype
Support.prototype = Car.prototype;
let s = new Support();

Tesla.prototype.setAutoPilotMode = function(mode) {
    this.autoPilotMode = mode;
    console.log(this.autoPilotMode);
}

let t1 = new Tesla('Blue', 'A4', 2022, 'Electric');
t1.start();
t1.autoPilotMode('Automatic');


