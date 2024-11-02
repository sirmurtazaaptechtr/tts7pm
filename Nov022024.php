<?php
    function my_fun1 () {
        echo "<h1>Hello!</h1>";
    }
    
    function my_fun2 (): void  /* signature of the funciton*/{
        // defination of the function
        echo "<h1>Hi There!</h1>";
    }

    function my_fun3 ($name): void {
        echo "<h1>Greetings of the Day</h1>";
        echo "<h3>Hi $name</h3>";
    }
    
    function squrer ($number): float {
        $result = $number * $number;
        return $result;
    }

    function show_bio ($name, $age = false): void {
        if(!$age) {
            echo "<p>Hi $name!</p>";
        }else {
            echo "<p>Hi $name! You are $age years old.</p>";
        }
    }

    my_fun1();// call to my_fun1
    my_fun2();
    my_fun1();
    my_fun3("Syeda Ansharah");
    my_fun3("Ashar Parekh");

    // Method 1:
    echo "<p>" . squrer(15) . "</p>";
    // Method 2:
    $res = squrer(15);
    var_dump($res);
    echo "<p>$res</p>";

    show_bio("Muhammad Hussain",14);
    show_bio("Junaid Parekh");
    show_bio("Ahsan Mughal",0);