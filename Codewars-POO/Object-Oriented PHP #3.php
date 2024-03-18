<?php 


/*

---- Class Constants and the "const" keyword ----

A class constant is, as its name suggests, a constant that belongs to a particular class. 
Being a constant and not a property, the class constant cannot be modified. Apart from that, one major benefit 
of class constants is that you do not have to instantiate a new instance of the class to access the constant - you can 
access the constant directly from the class!

A class constant is declared and defined using the following syntax: 
class MyClass {
  // Class code here 
  const my_constant = "some value";
  // More class code here 
}

Note that for class constants, a visibility declaration is not required (i.e. you do not have to type public, private or protected
in front of the const keyword) and it defaults to public visibility (in fact, I do not know if you can make a private or protected class constant - 
you will have to try that in your own local server!). Furthermore, also notice that the constant defined does not have the dollar sign $ appended 
at the start of the constant name like variables or class properties. If you append a dollar sign at the start of the constant name, chances are 
that you'll get a syntax error (but I have not confirmed it).

Then, to access the class variable, simply use the double colon :: syntax: MyClass::my_constant, e.g.
echo MyClass::my_constant; // "some value"

---- Class Methods and the "static" keyword ----
In some cases, it may be impractical to define a class and a class method, only to instantiate exactly one object from that class 
just to use a particular method. If that is the case, you are better off with static class methods. Static class methods are class methods that 
can be directly accessed through the class without the creation of a new instance of that class, and the syntax to define it is as follows:

class MyClass {
  // Class code here 
  public static function my_static_class_method( arguments here ) {
    // Static Method Code here 
  }
  // More class code here 
}

The static keyword is placed between the visibility declaration and the function definition, and it tells PHP that, "Hey, I want to access 
this particular method directly from the class without creating an object from it!". It should also be possible to set the visibility of a static 
method to protected or private but I haven't tested it yet so you are free to test it in your local servers in your spare time.
To access a static class method, the double colon :: is used in exactly the same way as accessing a class constant, e.g.

class MyClass {
  public static function say_hello_world() {
    echo "Hello World";
  }
}
MyClass::say_hello_world(); // "Hello World"

---- Task ----

1-Copy your working solution to the first Kata of this series and paste it here (you may want to complete that first if you haven't already done so).
2-Rename that class to CurrentUSPresident.
3-Convert all of the class properties into class constants and all of the class methods into static methods using the syntax taught in the lesson.
4-You can safely remove the code where an instance of the President class is created.

*/


class CurrentUSPresident {
  const name = "Barack Obama";
  public static function greet($name) {
    return "Hello $name, my name is Barack Obama, nice to meet you!";
  }
}
$president_name = CurrentUSPresident::name;
$greetings_from_president = CurrentUSPresident::greet("Donald");