<?php 


/*

---- Task ----


1-Define a class called Person.
2-Since all Persons are of the species "Homo Sapiens", make that a class constant
3-Declare (but do not define yet) the 3 class properties $name, $age and $occupation. *They should all be *public.
4-Define a class constructor which accepts exactly three arguments in the following order: $name, $age, $occupation and store them in their respective properties.
5-Define a method called introduce which accepts no arguments and returns a string of the format "Hello, my name is NAME_HERE"
6-Define another method called describe_job which accepts no arguments and returns a string of the format "I am currently working as a(n) OCCUPATION_HERE" (NOTE: The "a(n)" part of the string is literal which means you do not have to create conditionals to check whether "a" or "an" should be used.)
7-When extraterrestrials arrive on Earth, all Persons are expected to greet them in exactly the same way. Therefore, define a static class method called greet_extraterrestrials which accepts an argument $species and returns a string of the format "Welcome to Planet Earth SPECIES_NAME_HERE!"

*/


class Person
{
    /**
     * This is a constant, and by convention should be SPECIES.
     * @var string
     */
    const species = 'Homo Sapiens';
    
    /**
     * The name of this Person.
     * @var string
     */
    public $name;
    
    /**
     * The age of this Person.
     * @var int
     */
    public $age;
    
    /**
     * The occupation of this Person.
     * @var string
     */
    public $occupation;
    
    /**
     * Construct a new Person instance.
     * @param string $name
     * @param int $age
     * @param string $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }
    
    /**
     * Introduce a Person.
     * @return string
     */
    public function introduce(): string
    {
        return 'Hello, my name is ' . $this->name;
    }
    
    /**
     * Describe this person's occupation.
     * Personally, I'd have named it `occupation()` or `describeJob()`.
     * @return string
     */
    public function describe_job(): string
    {
        return 'I am currently working as a(n) ' . $this->occupation;
    }
    
    /**
     * Greet a species.
     * Personally, I would name this `greet(string $species)`.
     * @param string $species
     * @return string
     */
    public function greet_extraterrestrials(string $species): string
    {
        return "Welcome to Planet Earth {$species}!";
    }
}