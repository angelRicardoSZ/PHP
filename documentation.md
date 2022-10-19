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
    
    
    
    *Arrays
    
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
      
    Example #6 Complex Type Casting and Overwriting example

      This example includes all variations of type casting of keys and overwriting of elements.

      Input
      
        <?php
        $array = array(
            1    => 'a',
            '1'  => 'b', // the value "a" will be overwritten by "b"
            1.5  => 'c', // the value "b" will be overwritten by "c"
            -1 => 'd',
            '01'  => 'e', // as this is not an integer string it will NOT override the key for 1
            '1.5' => 'f', // as this is not an integer string it will NOT override the key for 1
            true => 'g', // the value "c" will be overwritten by "g"
            false => 'h',
            '' => 'i',
            null => 'j', // the value "i" will be overwritten by "j"
            'k', // value "k" is assigned the key 2. This is because the largest integer key before that was 1
            2 => 'l', // the value "k" will be overwritten by "l"
        );
     
        var_dump($array);
        ?>
    
    Output
    
        array(7) {
            [1]=>
            string(1) "g"
            [-1]=>
            string(1) "d"
            ["01"]=>
            string(1) "e"
            ["1.5"]=>
            string(1) "f"
            [0]=>
            string(1) "h"
            [""]=>
            string(1) "j"
            [2]=>
            string(1) "l"
          }
          
  Example #7 Accessing array elements
  
  Input
  
    <?php
    $array = array(
        "foo" => "bar",
        42    => 24,
        "multi" => array(
             "dimensional" => array(
                 "array" => "foo"
             )
        )
    );

    var_dump($array["foo"]);
    var_dump($array[42]);
    var_dump($array["multi"]["dimensional"]["array"]);
    ?>
    
  Output
  
    string(3) "bar"
    int(24)
    string(3) "foo"
    
  Array destructuring
  
  Arrays can be destructured using the [] (as of PHP 7.1.0) or list() language constructs. These constructs can be used to destructure an array into distinct        variables.
 
  <?php
  $source_array = ['foo', 'bar', 'baz'];

  [$foo, $bar, $baz] = $source_array;

  echo $foo;    // prints "foo"
  echo $bar;    // prints "bar"
  echo $baz;    // prints "baz"
  ?>
  
  Array destructuring can be used in foreach to destructure a multi-dimensional array while iterating over it.
  
  <?php
  $source_array = [
      [1, 'John'],
      [2, 'Jane'],
  ];

  foreach ($source_array as [$id, $name]) {
      // logic here with $id and $name
  }
  ?>
  
  --Functions arrays
  
  array_map
  
  Applies the callback to the elements of the given arrays
  
  Syntaxis
  
  array_map(?callable $callback, array $array, array ...$arrays): array
  
  array_map() returns an array containing the results of applying the callback to the corresponding value of array (and arrays if more    arrays are provided) used as       arguments for the callback.
  The number of parameters that the callback function accepts should match the number of arrays passed to array_map().
  Excess input arrays  are ignored. An ArgumentCountError is thrown if an insufficient number of arguments is provided.
  
  Parameters
  
  callback
    A callable to run for each element in each array.

    null can be passed as a value to callback to perform a zip operation on multiple arrays. If only array is provided, array_map() will     return the input array.
  
  array 
    An array to run through the callback function.
    
   arrays
    Supplementary variable list of array arguments to run through the callback function.
    
  Return Values
    Returns an array containing the results of applying the callback function to the corresponding value of array (and arrays if more      arrays are provided) used as arguments for the callback.

  The returned array will preserve the keys of the array argument if and only if exactly one array is passed. If more than one array is passed, the returned array will have sequential integer keys.
  
  Example
  
  Example #1 array_map() example
  
  Input
  
  <?php
  function cube($n)
  {
      return ($n * $n * $n);
  }

  $a = [1, 2, 3, 4, 5];
  $b = array_map('cube', $a);
  print_r($b);
  ?>
  
  Output
  
    Array
  (
      [0] => 1
      [1] => 8
      [2] => 27
      [3] => 64
      [4] => 125
  )
  
  Example #2 array_map() using a lambda function
  
  Input:
  
  <?php
  $func = function(int $value): int {
      return $value * 2;
  };

  print_r(array_map($func, range(1, 5)));

  // Or as of PHP 7.4.0:

  print_r(array_map(fn($value): int => $value * 2, range(1, 5)));

  ?>
  
  Output:
  Array
  (
      [0] => 2
      [1] => 4
      [2] => 6
      [3] => 8
      [4] => 10
  )
  
  Example #3 array_map() - using more arrays
  
  Input

    <?php
    function show_Spanish(int $n, string $m): string
    {
        return "The number {$n} is called {$m} in Spanish";
    }

    function map_Spanish(int $n, string $m): array
    {
        return [$n => $m];
    }

    $a = [1, 2, 3, 4, 5];
    $b = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

    $c = array_map('show_Spanish', $a, $b);
    print_r($c);

    $d = array_map('map_Spanish', $a , $b);
    print_r($d);
    ?>
    
   Output

          // printout of $c
      Array
      (
          [0] => The number 1 is called uno in Spanish
          [1] => The number 2 is called dos in Spanish
          [2] => The number 3 is called tres in Spanish
          [3] => The number 4 is called cuatro in Spanish
          [4] => The number 5 is called cinco in Spanish
      )

      // printout of $d
      Array
      (
          [0] => Array
              (
                  [1] => uno
              )

          [1] => Array
              (
                  [2] => dos
              )

          [2] => Array
              (
                  [3] => tres
              )

          [3] => Array
              (
                  [4] => cuatro
              )

          [4] => Array
              (
                  [5] => cinco
              )

      )
      
  Usually when using two or more arrays, they should be of equal length because the callback function is applied in parallel to the corresponding elements.
  If the arrays are of unequal length, shorter ones will be extended with empty elements to match the length of the longest.

  An interesting use of this function is to construct an array of arrays, which can be easily performed by using null as the name of the callback function
  
  Example #4 Performing a zip operation of arrays
  
  Input
  
    <?php
    $a = [1, 2, 3, 4, 5];
    $b = ['one', 'two', 'three', 'four', 'five'];
    $c = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];

    $d = array_map(null, $a, $b, $c);
    print_r($d);
    ?>
   
  Output
  
    Array
      (
          [0] => Array
              (
                  [0] => 1
                  [1] => one
                  [2] => uno
              )

          [1] => Array
              (
                  [0] => 2
                  [1] => two
                  [2] => dos
              )

          [2] => Array
              (
                  [0] => 3
                  [1] => three
                  [2] => tres
              )

          [3] => Array
              (
                  [0] => 4
                  [1] => four
                  [2] => cuatro
              )

          [4] => Array
              (
                  [0] => 5
                  [1] => five
                  [2] => cinco
              )

      )
  
  Example #6 array_map() - with string keys

  Input
  
    <?php
    $arr = ['stringkey' => 'value'];
    function cb1($a) {
        return [$a];
    }
    function cb2($a, $b) {
        return [$a, $b];
    }
    var_dump(array_map('cb1', $arr));
    var_dump(array_map('cb2', $arr, $arr));
    var_dump(array_map(null,  $arr));
    var_dump(array_map(null, $arr, $arr));
    ?>
  
  Output
  
    array(1) {
      ["stringkey"]=>
      array(1) {
        [0]=>
        string(5) "value"
      }
    }
    array(1) {
      [0]=>
      array(2) {
        [0]=>
        string(5) "value"
        [1]=>
        string(5) "value"
      }
    }
    array(1) {
      ["stringkey"]=>
      string(5) "value"
    }
    array(1) {
      [0]=>
      array(2) {
        [0]=>
        string(5) "value"
        [1]=>
        string(5) "value"
      }
    }
  
  Example #7 array_map() - associative arrays
  
  While array_map() does not directly support using the array key as an input, that may be simulated using array_keys().
  
  Input
  
    <?php
    $arr = [
        'v1' => 'First release',
        'v2' => 'Second release',
        'v3' => 'Third release',
    ];

    // Note: Before 7.4.0, use the longer syntax for anonymous functions instead.
    $callback = fn(string $k, string $v): string => "$k was the $v";

    $result = array_map($callback, array_keys($arr), array_values($arr));

    var_dump($result);
    ?>
  
  Output
  
    array(3) {
      [0]=>
      string(24) "v1 was the First release"
      [1]=>
      string(25) "v2 was the Second release"
      [2]=>
      string(24) "v3 was the Third release"
    }
    
  
   --array_merge
   
   Input
   
          <?php
      $array = array (
          'websites' => array (
              'Search' => 'Google',
              'Social' => 'Facebook',
              'News' => 'NY Times' 
          ),
          'friends' => array (
              'Chris',
              'Jim',
              'Lynn',
              'Jeff',
              'Joanna' 
          ) 
      );

      $merged = array_merge ( $array ['websites'], $array ['friends'] );

      print_r ( $merged );
      ?>
      
    Output
    
            Array
      (
          [Search] => Google
          [Social] => Facebook
          [News] => NY Times
          [0] => Chris
          [1] => Jim
          [2] => Lynn
          [3] => Jeff
          [4] => Joanna
      )

   
   --array_keys
   
    Input
   
      <?php
      $keys = array_keys ( $merged );
      print_r ( $keys );
      ?>

    Output
    
          Array
    (
        [0] => Search
        [1] => Social
        [2] => News
        [3] => 0
        [4] => 1
        [5] => 2
        [6] => 3
        [7] => 4
    )
    
  
      
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
   
   
   *Logic operators
   Example	    Name      	Result
  $a and $b	    And	        true if both $a and $b are true.
  $a or $b	    Or         	true if either $a or $b is true.
  $a xor $b	    Xor       	true if either $a or $b is true, but not both.
  ! $a	        Not	        true if $a is not true.
  $a && $b	    And	        true if both $a and $b are true.  
  $a || $b	    Or        	true if either $a or $b is true.
  
  Example #1 Logical operators illustrated
  
  <?php

  // --------------------
  // foo() will never get called as those operators are short-circuit

  $a = (false && foo());
  $b = (true  || foo());
  $c = (false and foo());
  $d = (true  or  foo());

  // --------------------
  // "||" has a greater precedence than "or"

  // The result of the expression (false || true) is assigned to $e
  // Acts like: ($e = (false || true))
  $e = false || true;

  // The constant false is assigned to $f before the "or" operation occurs
  // Acts like: (($f = false) or true)
  $f = false or true;

  var_dump($e, $f);

  // --------------------
  // "&&" has a greater precedence than "and"

  // The result of the expression (true && false) is assigned to $g
  // Acts like: ($g = (true && false))
  $g = true && false;

  // The constant true is assigned to $h before the "and" operation occurs
  // Acts like: (($h = true) and false)
  $h = true and false;

  var_dump($g, $h);
  ?>
   
   
   Output
   bool(true)
  bool(false)
  bool(false)
  bool(true)
  
  
  
---------  Conditionals

** if, elseif

elseif, as its name suggests, is a combination of if and else. Like else, it extends an if statement to execute a different statement in case the original if expression evaluates to false. However, unlike else, it will execute that alternative expression only if the elseif conditional expression evaluates to true. For example, the following code would display a is bigger than b, a equal to b or a is smaller than b:
  
-- Syntaxis

  Input

    <?php
    if ($a > $b) {
        echo "a is bigger than b";
    } elseif ($a == $b) {
        echo "a is equal to b";
    } else {
        echo "a is smaller than b";
    }
    ?>
  
  Output
  
-- Note:

Note that elseif and else if will only be considered exactly the same when using curly brackets as in the above example. When using a colon to define your if/elseif conditions, you must not separate else if into two words, or PHP will fail with a parse error.
  
  
  <?php

  /* Incorrect Method: */
  if ($a > $b):
      echo $a." is greater than ".$b;
  else if ($a == $b): // Will not compile.
      echo "The above line causes a parse error.";
  endif;


  /* Correct Method: */
  if ($a > $b):
      echo $a." is greater than ".$b;
  elseif ($a == $b): // Note the combination of the words.
      echo $a." equals ".$b;
  else:
      echo $a." is neither greater than or equal to ".$b;
  endif;

  ?>  
  
  
  
  ** Switch
  
  The switch statement is similar to a series of IF statements on the same expression. In many occasions, you may want to compare the same variable (or expression) with many different values, and execute a different piece of code depending on which value it equals to. This is exactly what the switch statement is for.
  
  Note: Note that unlike some other languages, the continue statement applies to switch and acts similar to break. If you have a switch inside a loop and wish to continue to the next iteration of the outer loop, use continue 2.
  
  
  
  Example #1 switch structure
  
  Input
  
  <?php
  // This switch statement:

  switch ($i) {
      case 0:
          echo "i equals 0";
          break;
      case 1:
          echo "i equals 1";
          break;
      case 2:
          echo "i equals 2";
          break;
  }

  // Is equivalent to:

  if ($i == 0) {
      echo "i equals 0";
  } elseif ($i == 1) {
      echo "i equals 1";
  } elseif ($i == 2) {
      echo "i equals 2";
  }
  ?>
  
It is important to understand how the switch statement is executed in order to avoid mistakes. The switch statement executes line by line (actually, statement by statement). In the beginning, no code is executed. Only when a case statement is found whose expression evaluates to a value that matches the value of the switch expression does PHP begin to execute the statements. PHP continues to execute the statements until the end of the switch block, or the first time it sees a break statement. If you don't write a break statement at the end of a case's statement list, PHP will go on executing the statements of the following case. For example:

  <?php
  switch ($i) {
      case 0:
          echo "i equals 0";
      case 1:
          echo "i equals 1";
      case 2:
          echo "i equals 2";
  }
  ?>
  
  Here, if $i is equal to 0, PHP would execute all of the echo statements! If $i is equal to 1, PHP would execute the last two echo statements. You would get the expected behavior ('i equals 2' would be displayed) only if $i is equal to 2. Thus, it is important not to forget break statements (even though you may want to avoid supplying them on purpose under certain circumstances).
  
  In a switch statement, the condition is evaluated only once and the result is compared to each case statement. In an elseif statement, the condition is evaluated again. If your condition is more complicated than a simple compare and/or is in a tight loop, a switch may be faster.
  
  The statement list for a case can also be empty, which simply passes control into the statement list for the next case.
  
    <?php
  switch ($i) {
      case 0:
      case 1:
      case 2:
          echo "i is less than 3 but not negative";
          break;
      case 3:
          echo "i is 3";
  }
  ?>
  
  A special case is the default case. This case matches anything that wasn't matched by the other cases. For example:
  
  <?php
  switch ($i) {
      case 0:
          echo "i equals 0";
          break;
      case 1:
          echo "i equals 1";
          break;
      case 2:
          echo "i equals 2";
          break;
      default:
         echo "i is not equal to 0, 1 or 2";
  }
  ?>
  
  A case value may be given as an expression. However, that expression will be evaluated on its own and then loosely compared with the switch value. That means it cannot be used for complex evaluations of the switch value. For example:
  
  Input
  
  <?php
  $target = 1;
  $start = 3;

  switch ($target) {
      case $start - 1:
          print "A";
          break;
      case $start - 2:
          print "B";
          break;
      case $start - 3:
          print "C";
          break;
      case $start - 4:
          print "D";
          break;
  }

  // Prints "B"
  ?>
  
  
  For more complex comparisons, the value true may be used as the switch value. Or, alternatively, if-else blocks instead of switch.
  
  <?php
  $offset = 1;
  $start = 3;

  switch (true) {
      case $start - $offset === 1:
          print "A";
          break;
      case $start - $offset === 2:
          print "B";
          break;
      case $start - $offset === 3:
          print "C";
          break;
      case $start - $offset === 4:
          print "D";
          break;
  }

  // Prints "B"
  ?>
  
  
  
  
