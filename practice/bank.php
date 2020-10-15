<?php

# Define 4 different variables, which will
# each represent how much a given coin is worth
$penny_value = .01; # double value / float
$nickel_value = .05;
$dime_value = .10;
$quarter_value = .25;
$half_dollar_value = .50;

# Define 4 more variables, which will each
# represent how many of each coin is in the bank
$pennies = 300; # data type is integer
$nickels = 5;
$dimes = 0;
$quarters = 125;
$half_dollars = 33;

# Add up how much money is in the piggy bank
$total = ($pennies * $penny_value) + ($nickels * $nickel_value) + ($dimes * $dime_value) + ($quarters * $quarter_value) + ($half_dollars * $half_dollar_value);

// note the file doesn't need additional directory information since theyre' in the same folder.
// remove the closing php tag in order to avoid additional characters
require 'bank_view.php';