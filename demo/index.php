<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Class</title>
</head>

<body>
    <a href="../">Back</a>
    <h1>PHP Demo</h1>


    <?php

    // This is a PHP Comment
    /*
    This is a multiline comment
    */
    # This is a PHP comment

    echo 1; // simi-colon is not optional in PHP.
    echo '<br>';

    // let in JS = $ in PHP;
    $a = 1;
    $_a = 1;
    echo '<br>';

    // const in JS = define();
    define("TEST", 'this is a constant');
    echo TEST;
    echo '<br>';

    // Concatination - in JS we use + || in PHP we use .
    echo "from PHP: " . TEST;
    echo '<br>';

    // PHP Ops
    echo 1 * 2;
    $number = 1 + 2; // 3
    $number += 4; // 7
    $number++; // 8
    echo '<br>';

    $string = 'Hello ';
    $string .= 'World '; // Hello World
    $string .= 'in PHP'; // Hello World in PHP
    echo $string;
    echo '<br>';


    // Data types
    $str = 'string'; // string
    $str_2 = "string $number"; // string 8
    $int = 1; // integer
    $float = 1.5; // this is float (double)
    $bool = true; // boolean (true/false)
    $arr = [1, 2, 3]; // array
    $arr_2 = array(1, 2, 3); // array
    $obj = (object) [1, 2, 3]; // Object
    $null = null; // null

    // Associative arrays
    $a_arr = array(
        "name" => "Khalid",
        "class" => "PHP"
    );

    // debugging functions
    // var_dump($a_arr);
    // print_r($arr);

    // User-defined functions
    function add_to($b, $c)
    {
        echo $b + $c;
        return $b + $c;
    }

    // Variable Scope
    $x = 1;
    $y = 2;

    function check_scope()
    {
        global $x, $y; // now both variables are accissable. 
        $result = $x + $y;
        echo "<br>";
        echo "from inside the function: $result";
        echo "<br>";
        return $result;
    }
    // echo check_scope();

    function access_scope()
    {
        // Super Global Variables
        var_dump($GLOBALS['y']); // this will print $y value which is (2);
    }
    // access_scope();

    // String functions
    echo "<br>";
    // echo strlen('Hello World');
    // echo str_word_count('Hello World');
    // echo strrev('Hello World');
    // echo strpos('Hello World', 'World');
    // echo str_replace("World", "Jordan", "Hello World"); // Hello Jordan

    $sentence = "lorem ipsum dolor sit amet consectetur adipisicing elit";
    $arr_sentence = explode(' ', $sentence);
    // loop through each word and apply ucfirst($word)
    // use implode() to combine the array to string
    $new_sentence = implode(" ", $arr_sentence);

    // Numbers functions
    echo "<br>";
    $testing_number = 1; // int
    $testing_number_2 = 1.5; // float
    // is_int($value) - check if the $value type is integer
    // is_float($value) - check if the $value type is float
    // is_nan($value) - check if the $value is NOT a number
    // is_numeric($value) - check if the $value is a number

    // Casting data types (changing data types)
    echo "<br>";
    $string_to_int = (int) '2';
    $string_to_int2 = intval('2'); // change string to integer
    $test_casting = boolval(0); // false
    $test_casting = boolval(1); // true
    $test_casting = boolval(''); // false
    $test_casting = boolval('0'); // false
    $test_casting = boolval('1'); // true
    $test_casting = boolval('Lorem Ipsum'); // true

    // Math functions
    $min = min(3, 5, 2, 6);
    $max = max(3, 5, 2, 6);
    $round = round(1.2);
    $floor = floor(1.2);
    $ceil = ceil(1.2);
    $rand = rand(1, 10);


    // =========================================================
    // ================== Language Constructs ==================
    // =========================================================

    // ============= Conditional Statements

    // if statement 
    if (1 < 5) {
        // do something
    } elseif (1 == 2) {
        // do something else
    } else {
        // do something diffrent than the first something else
    }

    // switch statement
    $switch_var = 1;
    switch ($switch_var) {
        case 1:
            # code...
            break;

        default:
            # code...
            break;
    }

    // ============= Loops

    // while
    $while_var = 1;
    while ($while_var <= 10) {
        // echo $while_var;
        // echo "<br/>";
        $while_var++;
    }

    // do while
    $do_while_var = 11;
    do {
        // echo "$while_var <br>";
        // $do_while_var++;
    } while ($do_while_var <= 10);

    // for
    $for_arr = ['ahmad', 'khalid', 'roy', 'mike'];
    for ($i = 0; $i < count($for_arr); $i++) {
        // echo strtoupper($for_arr[$i]) . "<br>";
    }

    // array_push($for_arr, "test");
    // var_dump($for_arr);

    // Reversed sentence without using functions
    $lorem_sentence = "Lorem ipsum dolor sit";
    // echo "$lorem_sentence <br>";
    $lorem_sentence_arr = explode(" ", $lorem_sentence);
    $lorem_sentence_arr_length = count($lorem_sentence_arr);
    $reversed_lorem = '';
    // first part: $i = 3
    // second part: $i >= 0

    for ($i = $lorem_sentence_arr_length - 1; $i >= 0; $i--) {
        $reversed_lorem .= $lorem_sentence_arr[$i] . " ";
    }
    // echo $reversed_lorem . "<br>";

    // foreach
    $foreach_arr = ['ahmad', 'khalid', 'roy', 'mike'];
    foreach ($foreach_arr as $value) {
        // echo "$value <br>";
    }

    $foreach_a_arr = array(
        'name' => "ahmad",
        'age' => 22,
        'class' => 'PHP'
    );
    foreach ($foreach_a_arr as $key => $value) {
        echo "$key: $value <br>";
        // continue;
        // break;
    }


    // ============= Constructs with HTML
    $html = "<h2>Construct Demo</h2>";
    $html_switch = true;

    // if (true) {
    //     echo $html;
    // }
    ?>

    <div class="container">
        <?php if ($html_switch) { ?>
            <h2>Construct Demo - if statement (first syntax)</h2>
        <?php } ?>

        <?php if ($html_switch) : ?>
            <h2>Construct Demo - if statement (second syntax)</h2>
        <?php endif; ?>

        <h3>Foreach demo 1</h3>
        <?php
        // foreach ($foreach_arr as $value) {
        //     echo "<p>$value</p>";
        // }
        ?>
        <?php foreach ($foreach_arr as $value) { ?>
            <p>
                <?php echo $value ?>
            </p>
        <?php } ?>

        <h3>Foreach demo 2</h3>
        <?php foreach ($foreach_arr as $value) : ?>
            <p><?php echo $value ?></p>
            <p><?= $value ?></p>
        <?php endforeach ?>

    </div>

</body>

</html>