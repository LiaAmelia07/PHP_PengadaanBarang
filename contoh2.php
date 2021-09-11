<?php
$employee =[
    'name' => 'Jhon',
    'email' => 'john@google.com',
    'phone' => '1234567890',
];

echo $employee['name'];

foreach ($employee as $key => $value) {
    echo $key . ':' . $value;
    echo '<br>';
}




?>
