
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


  
  
  -------- properties --------
  
  Class member variables are called properties. They may be referred to using other terms such as fields, but for the purposes of this reference properties will be used. They are defined by using at least one modifier (such as Visibility, Static Keyword, or, as of PHP 8.1.0, readonly), optionally (except for readonly properties), as of PHP 7.4, followed by a type declaration, followed by a normal variable declaration. This declaration may include an initialization, but this initialization must be a constant value.
  
  
  Within class methods non-static properties may be accessed by using -> (Object Operator): $this->property (where property is the name of the property). Static properties are accessed by using the :: (Double Colon): self::$property
  
  The pseudo-variable $this is available inside any class method when that method is called from within an object context. $this is the value of the calling object.
  
  Example #1 Property declarations

      <?php
    class SimpleClass
    {
       public $var1 = 'hello ' . 'world';
       public $var2 = <<<EOD
    hello world
    EOD;
       public $var3 = 1+2;
       // invalid property declarations:
       public $var4 = self::myStaticMethod();
       public $var5 = $myVar;

       // valid property declarations:
       public $var6 = myConstant;
       public $var7 = [true, false];

       public $var8 = <<<'EOD'
    hello world
    EOD;

       // Without visibility modifier:
       static $var9;
       readonly int $var10;
    }
    ?>
    
   Type declarations
   
   Example #2 Example of typed properties
   
   <?php

    class User
    {
        public int $id;
        public ?string $name;

        public function __construct(int $id, ?string $name)
        {
            $this->id = $id;
            $this->name = $name;
        }
    }

    $user = new User(1234, null);

    var_dump($user->id);
    var_dump($user->name);

    ?>
    
    output
    
    int(1234)
    NULL
    
    
    Example #3 Accessing properties
    
    <?php

    class Shape
    {
        public int $numberOfSides;
        public string $name;

        public function setNumberOfSides(int $numberOfSides): void
        {
            $this->numberOfSides = $numberOfSides;
        }

        public function setName(string $name): void
        {
            $this->name = $name;
        }

        public function getNumberOfSides(): int
        {
            return $this->numberOfSides;
        }

        public function getName(): string
        {
            return $this->name;
        }
    }

    $triangle = new Shape();
    $triangle->setName("triangle");
    $triangle->setNumberofSides(3);
    var_dump($triangle->getName());
    var_dump($triangle->getNumberOfSides());

    $circle = new Shape();
    $circle->setName("circle");
    var_dump($circle->getName());
    var_dump($circle->getNumberOfSides());
    ?>
    
    output
    
    string(8) "triangle"
    int(3)
    string(6) "circle"

    Fatal error: Uncaught Error: Typed property Shape::$numberOfSides must not be accessed before initialization
    
    --Readonly properties
    
    
    Example #4 Example of readonly properties
    
    <?php

    class Test {
       public readonly string $prop;

       public function __construct(string $prop) {
           // Legal initialization.
           $this->prop = $prop;
       }
    }

    $test = new Test("foobar");
    // Legal read.
    var_dump($test->prop); // string(6) "foobar"

    // Illegal reassignment. It does not matter that the assigned value is the same.
    $test->prop = "foobar";
    // Error: Cannot modify readonly property Test::$prop
    ?>
    
    
    
    
  --Static Keyword
  
  Declaring class properties or methods as static makes them accessible without needing an instantiation of the class. These can also be accessed statically within an instantiated class object.
  
  ----static methods
  
  Because static methods are callable without an instance of the object created, the pseudo-variable $this is not available inside methods declared as static
    
  Example #1 Static method example 
   
    <?php
    class Foo {
        public static function aStaticMethod() {
            echo "test";
        }
    }

    Foo::aStaticMethod();
    $classname = 'Foo';
    $classname::aStaticMethod();
    ?>
    
    output
    
    test
    test
  
  ----static properties
        
    Static properties are accessed using the Scope Resolution Operator (::) and cannot be accessed through the object operator (->).

    It's possible to reference the class using a variable. The variable's value cannot be a keyword (e.g. self, parent and static).
    
    Example #2 Static property example
    
    <?php
        class Foo
        {
            public static $my_static = 'foo';

            public function staticValue() {
                return self::$my_static;
            }
        }

        class Bar extends Foo
        {
            public function fooStatic() {
                return parent::$my_static;
            }
        }

    <?
    
    print Foo::$my_static . "\n";    
    output: foo
    
    $foo = new Foo();
    
    print $foo->staticValue() . "\n";
    output: foo
    
    print $foo->my_static . "\n";     
    output:  Undefined "Property" my_static 
    
    
    print $foo::$my_static . "\n";  
    output: foo
    
    $classname = 'Foo';
    print $classname::$my_static . "\n";
    output: foo
      
    
    
