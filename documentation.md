Basic syntaxis

*var_dump

  Usage: shows the information of a variable
  
  Parameters: 
  
    expression:
      The variable that you want to empty the information.

  Example

    Input
    
      <?php
      $a = array(1, 2, array("a", "b", "c"));
      var_dump($a);
      ?>
    
    Output
    
      array(3) {
        [0]=>
        int(1)
        [1]=>
        int(2)
        [2]=>
        array(3) {
          [0]=>
          string(1) "a"
          [1]=>
          string(1) "b"
          [2]=>
          string(1) "c"
        }
      }


*print_r

  Usage: Prints human-readable information about a variable
  
  Parameters: 
  
    expression:
    The expression to be printed.

    return:
    If you want to capture the output of print_r(), use the return parameter.
    When the parameter is set to true, print_r() will return the data instead of printing it.

  Example:
  
    Input:
  
    <pre>
    <?php
    $a = array ('a' => 'manzana', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
    print_r ($a);
    ?>
    </pre>
    
    Output:
    
    <pre>
    Array
    (
        [a] => manzana
        [b] => banana
        [c] => Array
            (
                [0] => x
                [1] => y
                [2] => z
            )
    )
    </pre>
    
    
*Variable declaration

  Usage: In PHP, variables are represented by a dollar sign followed by the variable name. The variable name is case sensitive.
  
  Example:
    
    <?php
    $var = 'Roberto';
    $Var = 'Juan';
    echo "$var, $Var";      // prints "Roberto, Juan"

    $4site = 'aun no';      // invalid; starts with a number
    $_4site = 'aun no';     // valid; starts with an underscore character
    $täyte = 'mansikka';    // valid; 'ä' is ASCII (extended) 228
    ?> 

*constant declaration

  Usage: A constant is an identifier (name) for a simple value.
  As the name suggests, that value cannot change during the execution of the script (except for magic constants, which aren't actually constants).
  Constants are case-sensitive. By convention, constant identifiers are always uppercase.
  
  It is possible to define() constants with reserved or even invalid names, whose value can only be retrieved with the constant() function. However, doing so is not      recommended.
  
   Example #1 Valid and invalid constant names
   
   <?php

    // Valid constant names
    define("FOO",     "something");
    define("FOO2",    "something else");
    define("FOO_BAR", "something more");

    // Invalid constant names
    define("2FOO",    "something");

    // This is valid, but should be avoided:
    // PHP may one day provide a magical constant
    // that will break your script
    define("__FOO__", "something"); 

    ?>

--------------------------------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------------------------------------------------------------------------------------------------------------------------

 Datatypes
 https://www.php.net/manual/en/language.types.php
 
 PHP supports ten primitive types.

  Four scalar types:

    bool
    int
    float (floating-point number)
    string

  Four compound types:

    array
    object
    callable
    iterable

  And finally two special types:

    resource
    NULL

  The type of a variable is not usually set by the programmer; rather, it is decided at runtime by PHP depending on the context in which that variable is used.
   
   *Booleans
   
   This is the simplest type. A bool expresses a truth value. It can be either true or false.
   
   Syntax
   
   <?php
   $foo = True; // assign the value TRUE to $foo
   ?>
   
   
  *integers
  
    An int is a number of the set ℤ = {..., -2, -1, 0, 1, 2, ...}.
  
    Syntax 
    
    ints can be specified in decimal (base 10), hexadecimal (base 16), octal (base 8) or binary (base 2) notation. 
    The negation operator can be used to denote a negative int.
    
    Example #1 Integer literals
    
    <?php
    $a = 1234; // decimal number
    $a = 0123; // octal number (equivalent to 83 decimal)
    $a = 0o123; // octal number (as of PHP 8.1.0)
    $a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
    $a = 0b11111111; // binary number (equivalent to 255 decimal)
    $a = 1_234_567; // decimal number (as of PHP 7.4.0)
    ?>
    
    
  *Floating point numbers
   
    Floating point numbers (also known as "floats", "doubles", or "real numbers") can be specified using any of the following syntaxes:
    
    <?php
    $a = 1.234; 
    $b = 1.2e3; 
    $c = 7E-10;
    $d = 1_234.567; // as of PHP 7.4.0
    ?>
    
  *Strings
    
    A string is series of characters, where a character is the same as a byte. This means that PHP only supports a 256-character set, and hence does not offer native       Unicode support
    
    
    Sinlge quoted
    
    The simplest way to specify a string is to enclose it in single quotes (the character ').
    
    Example
    
    <?php
    echo 'this is a simple string';

    echo 'You can also have embedded newlines in
    strings this way as it is
    okay to do';

    // Outputs: Arnold once said: "I'll be back"
    echo 'Arnold once said: "I\'ll be back"';

    // Outputs: You deleted C:\*.*?
    echo 'You deleted C:\\*.*?';

    // Outputs: You deleted C:\*.*?
    echo 'You deleted C:\*.*?';

    // Outputs: This will not expand: \n a newline
    echo 'This will not expand: \n a newline';

    // Outputs: Variables do not $expand $either
    echo 'Variables do not $expand $either';
    ?>
    
    
    Double quoted
    
    If the string is enclosed in double-quotes ("), PHP will interpret the following escape sequences for special characters:
    
    Sequence	Meaning
    \n	      linefeed (LF or 0x0A (10) in ASCII)
    \r	      carriage return (CR or 0x0D (13) in ASCII)
    \t	      horizontal tab (HT or 0x09 (9) in ASCII)
    \v	      vertical tab (VT or 0x0B (11) in ASCII)
    \e	      escape (ESC or 0x1B (27) in ASCII)
    \f	      form feed (FF or 0x0C (12) in ASCII)
    \\      	backslash
    \$	      dollar sign
    \"	      double-quote
    \[0-7]{1,3}	the sequence of characters matching the regular expression is a character in octal notation, which silently overflows to fit in a byte (e.g. "\400" === "\000")
    \x[0-9A-Fa-f]{1,2}	the sequence of characters matching the regular expression is a character in hexadecimal notation
    \u{[0-9A-Fa-f]+}	the sequence of characters matching the regular expression is a Unicode codepoint, which will be output to the string as that codepoint's UTF-8 representation
    
    
    
    Arrays
    
    An array in PHP is actually an ordered map. A map is a type that associates values to keys. 
    This type is optimized for several different uses; it can be treated as an array, list (vector), hash table (an implementation of a map), dictionary, collection,       stack, queue, and probably more. As array values can be other arrays, trees and multidimensional arrays are also possible.
    
    Syntax
    
    An array can be created using the array() language construct. It takes any number of comma-separated key => value pairs as arguments.
    
    array(
    key  => value,
    key2 => value2,
    key3 => value3,
    ...
    )

    Example #1 A simple array
    
    <?php
    $array = array(
        "foo" => "bar",
        "bar" => "foo",
    );

    // Using the short array syntax
    $array = [
        "foo" => "bar",
        "bar" => "foo",
    ];
    ?>
    
    The key can either be an int or a string. The value can be of any type.
    
    Example #2 Type Casting and Overwriting example
    
    <?php
    $array = array(
        1    => "a",
        "1"  => "b",
        1.5  => "c",
        true => "d",
    );
    var_dump($array);
    ?>
    
    output
    
    array(1) {
    [1]=>
    string(1) "d"
    }
    
    As all the keys in the above example are cast to 1, the value will be overwritten on every new element and the last assigned value "d" is the only one left over.
    

    Example #3 Mixed int and string keys
    
    Input
    
      <?php
      $array = array(
          "foo" => "bar",
          "bar" => "foo",
          100   => -100,
          -100  => 100,
      );
      var_dump($array);
      ?>
    
    Output
    
      array(4) {
      ["foo"]=>
      string(3) "bar"
      ["bar"]=>
      string(3) "foo"
      [100]=>
      int(-100)
      [-100]=>
      int(100)
      }
  
    
   Example #4 Indexed arrays without key
   
   Input
   
     <?php
     $array = array("foo", "bar", "hello", "world");
     var_dump($array);
     ?>
   
   Output
   
     array(4) {
      [0]=>
      string(3) "foo"
      [1]=>
      string(3) "bar"
      [2]=>
      string(5) "hello"
      [3]=>
      string(5) "world"
      }
    
    Example #5 Keys not on all elements
    
    Input
    
      <?php
      $array = array(
               "a",
               "b",
          6 => "c",
               "d",
      );
      var_dump($array);
      ?>
    
    output
      
      array(4) {
      [0]=>
      string(1) "a"
      [1]=>
      string(1) "b"
      [6]=>
      string(1) "c"
      [7]=>
      string(1) "d"
      }
      
      
  *iterables
  Iterable is a pseudo-type introduced in PHP 7.1. It accepts any array or object implementing the Traversable interface.
  Both of these types are iterable using foreach and can be used with yield from within a generator.
      
      Example #1 Iterable parameter type example
      
      <?php

      function foo(iterable $iterable) {
          foreach ($iterable as $value) {
              // ...
          } 
      }

      ?>
   
