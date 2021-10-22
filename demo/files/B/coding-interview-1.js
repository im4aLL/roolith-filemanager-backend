// convert it to ES6 class based implementation
function Animal() {
    this.name = 'Not assigned';

    return this;
}

Animal.prototype.getName = function() {
    return this.name;
}

function Dog() {
    this.name = 'Dog';
}

Dog.prototype = new Animal();

var dog = new Dog();
dog.getName(); // will print `Dog`
