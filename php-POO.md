
Reference: 
    -- https://www.php.net/manual/en/language.oop5.basic.php
    -- PHP 8 Objects, Patterns and practice
  
  
 
 # chapter 3: objects basics

    Basic class definitions begin with the keyword class, followed by a class name, followed by a pair of curly braces which enclose the definitions of the properties and methods belonging to the class.
    
    ------------ Syntax  -------------
    
    A class may contain its own constants, variables (called "properties"), and functions (called "methods").
    
    <?php
        class SimpleClass
        {
            // property declaration
            public $var = 'a default value';

            // method declaration
            public function displayVar() {
                echo $this->var;
            }
        }
    ?>
    
    The pseudo-variable $this is available when a method is called from within an object context. $this is the value of the calling object.
    
    
    -------------- new  ---------------
    
    To create an instance of a class, the new keyword must be used. An object will always be created unless the object has a constructor defined that throws an exception on error. Classes should be defined before instantiation (and in some cases this is a requirement).
    
    ** Example #5 Object Assignment

      <?php

      $instance = new SimpleClass();

      $assigned   =  $instance;
      $reference  =& $instance;

      $instance->var = '$assigned will have this value';

      $instance = null; // $instance and $reference become null

      var_dump($instance);
      var_dump($reference);
      var_dump($assigned);

      ?>
    
    Ooutput:
    
      NULL
      NULL
      object(SimpleClass)#1 (1) {
         ["var"]=>
           string(30) "$assigned will have this value"
      }
      
    ** Example #7 Access member of newly created object
    
    <?php
    echo (new DateTime())->format('Y');
    ?>
    
      ---------- Properties and methods -----------
      
      Class properties and methods live in separate "namespaces", so it is possible to have a property and a method with the same name. Referring to both a property and a method has the same notation, and whether a property will be accessed or a method will be called, solely depends on the context, i.e. whether the usage is a variable access or a function call.
      
     ** Example #8 Property access vs. method call
      
      <?php
      class Foo
      {
          public $bar = 'property';

          public function bar() {
              return 'method';
          }
      }

      $obj = new Foo();
      echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;
      
      output:
      
      property
      method
      
      
      That means that calling an anonymous function which has been assigned to a property is not directly possible. Instead the property has to be assigned to a variable first, for instance. It is possible to call such a property directly by enclosing it in parentheses.
      
     ** Example #9 Calling an anonymous function stored in a property
      
      <?php
      class Foo
      {
          public $bar;

          public function __construct() {
              $this->bar = function() {
                  return 42;
              };
          }
      }

      $obj = new Foo();

      echo ($obj->bar)(), PHP_EOL;
      
      output
      
      42
      
      ----------------------  extends ----------------------------
      
      A class can inherit the constants, methods, and properties of another class by using the keyword extends in the class declaration. It is not possible to extend multiple classes; a class can only inherit from one base class.
      
      The inherited constants, methods, and properties can be overridden by redeclaring them with the same name defined in the parent class. However, if the parent class has defined a method or constant as final, they may not be overridden. It is possible to access the overridden methods or static properties by referencing them with parent::.
      
     ** Example #10 Simple Class Inheritance
      
      <?php
      class ExtendClass extends SimpleClass
      {
          // Redefine the parent method
          function displayVar()
          {
              echo "Extending class\n";
              parent::displayVar();
          }
      }

      $extended = new ExtendClass();
      $extended->displayVar();
      ?>
      
      output
      
      Extending class
      a default value
      
      Signature compatibility rules
      When overriding a method, its signature must be compatible with the parent method. Otherwise, a fatal error is emitted, or, prior to PHP 8.0.0, an E_WARNING         level error is generated. A signature is compatible if it respects the variance rules, makes a mandatory parameter optional, and if any new parameters are           optional. This is known as the Liskov Substitution Principle, or LSP for short. The constructor, and private methods are exempt from these signature        compatibility rules, and thus won't emit a fatal error in case of a signature mismatch.
      
      ** Example #11 Compatible child methods
      
      <?php

class Base
{
    public function foo(int $a) {
        echo "Valid\n";
    }
}

class Extend1 extends Base
{
    function foo(int $a = 5)
    {
        parent::foo($a);
    }
}

class Extend2 extends Base
{
    function foo(int $a, $b = 5)
    {
        parent::foo($a);
    }
}

$extended1 = new Extend1();
$extended1->foo();
$extended2 = new Extend2();
$extended2->foo(1);
  
  output
  
  Valid
  Valid
  
  ** Example #12 Fatal error when a child method removes a parameter
  
  <?php

    class Base
    {
        public function foo(int $a = 5) {
            echo "Valid\n";
        }
    }

    class Extend extends Base
    {
        function foo()
        {
            parent::foo(1);
        }
    }

    output

    Fatal error: Declaration of Extend::foo() must be compatible with Base::foo(int $a = 5) in /in/evtlq on line 13

    ** Example #13 Fatal error when a child method makes an optional parameter mandatory
    
        <?php

    class Base
    {
        public function foo(int $a = 5) {
            echo "Valid\n";
        }
    }

    class Extend extends Base
    {
        function foo(int $a)
        {
            parent::foo($a);
        }
    }

output

Fatal error: Declaration of Extend::foo(int $a) must be compatible with Base::foo(int $a = 5) in /in/qJXVC on line 13

---------------------- Nullsafe methods and properties  ----------------------

As of PHP 8.0.0, properties and methods may also be accessed with the "nullsafe" operator instead: ?->. The nullsafe operator works the same as property or method access as above, except that if the object being dereferenced is null then null will be returned rather than an exception thrown. If the dereference is part of a chain, the rest of the chain is skipped.

    <?php

    // As of PHP 8.0.0, this line:
    $result = $repository?->getUser(5)?->name;

    // Is equivalent to the following code block:
    if (is_null($repository)) {
        $result = null;
    } else {
        $user = $repository->getUser(5);
        if (is_null($user)) {
            $result = null;
        } else {
            $result = $user->name;
        }
    }
    ?>


  
  
      
      
    
