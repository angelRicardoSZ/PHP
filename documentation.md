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


