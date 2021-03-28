<h1>TESTING ARRAY FUNCTIONS</h1>
<div>
    <?php 
    

    $numberArray = [1, 2, 3, 4, 5, 6];
    $numberArray2 = [6, 7, 8, 9, 10, 11];
    $randomNumArray1 = [3, 3, 4, 2, 9, 1, 4, 3, 2, 7];
    $randomNumArray2 = [6, 3, 4, 2, 9, 1, 3, 2];
    $mixedArray = [null, 2, 'yes', -1, true, 0, 'foo'];
    $colorArray = ['red', 'green', 'blue', 'purple'];
    $animalArray = ['cat', 'dog', 'horse', 'turtle'];
    $inputArray = ['fiRst' => '1', 'sEconD' => '2', 'ThirD' => '3',  'foRTh'];
    $inputArray2 = ['fiRst' => '1', 'sEconD', 'ThirD' => '6'];

    $records = [
        [
            'id' => 2135,
            'first_name' => 'John',
            'last_name' => 'Doe',
        ],
        [
            'id' => 3245,
            'first_name' => 'Sally',
            'last_name' => 'Smith',
        ],
        [
            'id' => 5342,
            'first_name' => 'Jane',
            'last_name' => 'Jones',
        ],
        [
            'id' => 5623,
            'first_name' => 'Peter',
            'last_name' => 'Dope',
        ]
    ];



    echo('<br>'.'<br>'.'<br>'.'array_change_key_case'. '<br>');

    print_r(array_change_key_case($inputArray, CASE_UPPER));

    echo('<br>'.'<br>'.'<br>'.'array_chunk' . '<br>');

    print_r(array_chunk($numberArray, 2, true));
    
    echo('<br>'.'<br>'.'<br>'.'array_column' . '<br>');

    print_r(array_column($records, 'last_name'));

    echo('<br>'.'<br>'.'<br>'.'array_combine' . '<br>');

    print_r(array_combine($colorArray, $animalArray));

    echo('<br>'.'<br>'.'<br>'.'array_count_values' . '<br>');

    print_r(array_count_values($randomNumArray1));

    echo('<br>'.'<br>'.'<br>'.'array_diff_assoc = similar to array_diff' . '<br>');

    print_r(array_diff_assoc($inputArray, $inputArray2));
    
    echo('<br>'.'<br>'.'<br>'.'array_diff_key = similar to array_diff' . '<br>');

    print_r(array_diff_key($inputArray, $inputArray2));

    echo('<br>'.'<br>'.'<br>'.'array_diff_uassoc TO REVIEW');

    echo('<br>'.'<br>'.'<br>'.'array_diff' . '<br>');

    print_r(array_diff($inputArray, $inputArray2));

    echo('<br>'.'<br>'.'<br>'.'array_fill_keys' . '<br>');

    print_r(array_fill_keys($numberArray, 'number'));

    echo('<br>'.'<br>'.'<br>'.'array_fill' . '<br>');

    print_r(array_fill(-5, 5,'Número'));

    echo(strtoupper('<br>'.'<br>'.'<br>'.'array_filter TO REVIEW'));

    echo('<br>'.'<br>'.'<br>'.'array_filter' . '<br>');

    print_r(array_filter($mixedArray));

    echo('<br>'.'<br>'.'<br>'.'array_flip' . '<br>');

    print_r($randomNumArray1);
    echo('<br>');
    echo('Flipped ');
    print_r(array_flip($randomNumArray1));

    echo('<br>'.'<br>'.'<br>'.'array_intersect_assoc' . '<br>');

    print_r(array_intersect_assoc($numberArray, $numberArray2 ));

    echo('<br>'.'<br>'.'<br>'.'array_flip' . '<br>');

    

    ?> 
</div>