<?php 

/*




----- Classes -----

In PHP (and many other programming languages), classes is the basis of creating what is known as objects - any object in PHP must be an instance of a class. 
A class basically defines what properties and methods a created object (which is an instance of said class) will have, and an object is basically a collection 
of variables and functions (called properties and methods respectively when used in the context of objects) that belong to it.
So basically, in words, the class keyword, followed by the name of the class, followed by curly braces {} in which all the actual class code resides.

You may have noticed that the name of the class I just defined MyClass is not in snake_case as you might expect. 
This is because although the standard naming convention in PHP for variables and functions, etc., is snake_case, there is a convention that supercedes all 
language naming conventions when it comes to naming classes in OOP - and that is PascalCase. It does not matter whether the original language naming convention 
is snake_case, camelCase or PascalCase in said language; when it comes to OOP and naming classes, all languages use PascalCase. 
Note however that this is a convention and not a syntax requirement; if you name your class my_class or myClass the code will still work as expected; 
it's just that your code will be harder to read and understand for other programmers.

---- Class Variables and Functions (known as "Properties" and "Methods" respectively) ----
You can define variables and functions inside a class (called "properties" and "methods" respectively) as usual, except for one key 
difference - inside a class, when you define a property (class variable) or method (class function), you MUST specify its visibility, 
which could be either of public, private and protected

---- Task ----
Note: The lesson provided in this Kata is designed to teach you most, if not all, of the key concepts required to complete the Task in this Kata. However, if in doubt, you are strongly encouraged to conduct your own research.
1-Define a class called President using the syntax taught above.
2-Inside the curly braces of the class definition, add a public property called $name and set it equal to the string "Barack Obama".
3-Then, define a public method inside the President class called greet which accepts one argument $name and returns something to the effect of "Hello INSERT_NAME_HERE, my name is Barack Obama, nice to meet you!"
4-Now that you have defined your class, create an instance of that class (called an object) and store it in a variable called $us_president.
5-Store the name of the $us_president into another variable called $president_name.
6-Store the result of calling the greet method of $us_president with the argument "Donald" into the variable $greetings_from_president.
*/

class President {
    public $name = "Barack Obama";
    public function greet($name) {
      return "Hello $name, my name is Barack Obama, nice to meet you!";
    }
  }

  $us_president = new President;
  $president_name = $us_president->name;
  $greetings_from_president = $us_president->greet("Donald");
