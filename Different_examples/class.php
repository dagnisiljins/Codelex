<?php

class MyClass
{
    //Define a class variable
    public $classVar = 'Hello World';

    //Define class method
    public function myMethod()
    {
        //Use the class variable
        echo $this->classVar; //Output: Hello World
    }

}