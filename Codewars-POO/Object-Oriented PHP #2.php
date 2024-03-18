<?php 


/*

---- Class Constructors and the $this keyword ----

Enter the class constructor! The constructor function of a class is a special function that is called every time a new instance of 
the class is created using the new keyword The only thing to notice here is that when you define the class constructor, 
the name of the (special) "method" must ALWAYS be __construct (two underscores before the word "construct" not one). 
The class constructor is an example of a magic method in PHP (more info here) wich means that if you name your "method" __construct, PHP 
will automatically recognise it as the class constructor and not any ordinary class method.

In the constructor, you can then set and customize the properties of the object being instantiated by referring to the created object itself 
and using the arrow notation -> taught in the previous lesson.

Now, here comes the interesting question: how do you refer to the created object itself if you do not know what the variable name of the created 
object will be? For example, when using your class MyClass, you may decide to store new MyClass in a variable called $obj1, but when someone else 
is using your class, they may store it in a variable called $obj2! Then, of course, there is the added problem of very possibly instantiating 
multiple objects from the same class (hey, otherwise, what would we need a class for?) and last but not least, function scope in PHP.

---- Task ----

Note: The lesson provided in this Kata is designed to teach you most, if not all, of the key concepts required to complete the Task in this Kata. However, if in doubt, you are strongly encouraged to conduct your own research.

1-Define a class called Person.
2-Inside the Person class, declare (but do not define) the two public properties, called $first_name and $last_name respectively.
3-Define a class constructor which accepts exactly two arguments in the following order, $first_name and $last_name. The argument $first_name should be stored into the $first_name property of the object being instantiated and the $last_name argument should be stored into the $last_name property of the object.
4-Define a public method called get_full_name which accepts no arguments and returns the full name of the individual in the following format: "FIRST_NAME LAST_NAME". Please note that if the properties ($first_name and/or $last_name) of said object is modified after it is instantiated, your method get_full_name should return the updated full name, not the original full name of the individual.

*/


class Person {
    public $first_name;
    public $last_name;
    public function __construct($first_name, $last_name) {
      $this->first_name = $first_name;
      $this->last_name = $last_name;
    }
    public function get_full_name() {
      return "$this->first_name $this->last_name";
    }
}