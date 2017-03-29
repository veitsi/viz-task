<?php
require "pattern.php";

class Readability
{
    function ease_score($writing_sample)
    {
        # Calculate score
        # Return of 0.0 to 100.0
        return 9999;
    }
}
class Pattern
{

}

$readability = new Readability();
echo $readability->ease_score("Hello world");
echo "\n";

$pattern = new Pattern();
echo "Printing size of the first of four pattern arrays: ";
echo sizeof($pattern->{'subtract_syllable_patterns'});

# What PHP version is this?
echo "\n";
echo 'Current PHP version: ' . phpversion();

?>