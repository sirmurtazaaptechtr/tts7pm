<?php
    $flag = 1;// global variable
    function my_fun() {
        global $flag;
        $name = "Ali Raza";// local variable
        $age = 21;// local variable

        echo "<p>Dear $name, You are $age years old.</p>";
        echo "<p>Inside $flag</p>";
    }
    function anohter($fullname)/*parameter variable */ {
        echo "<p>Dear $fullname, how do you do?</p>";
    }

    function counter () {
        static $cnt = 0;// static variable
        $cnt ++;
        echo "<p>$cnt</p>";
    }

    function swap (&$a,&$b) {
        echo "<p>Inside+Before ($a, $b)</p>";
        $temp = $a;
        $a = $b;
        $b = $temp;
        echo "<p>Inside+After ($a, $b)</p>";
    }

    my_fun();

    // echo "<p>Hi $name</p>";
    echo "<p>Hi $flag</p>";
    anohter('Syeda Ansharah');

    counter();
    counter();
    counter();

    $x = 10;
    $y = 15;
    echo "<p>Outside+Before ($x, $y)</p>";
    swap($x,$y);
    echo "<p>Outside+After ($x, $y)</p>";