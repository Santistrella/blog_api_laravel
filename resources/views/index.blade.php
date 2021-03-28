<h1>TESTING ARRAY FUNCTIONS</h1>
<div style="font-size:20px;line-height: 1.8;">
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
    echo('Array 1:');
    print_r($inputArray);
    echo('<br>'.'<br>'.'Array 2: array'.'<br>');
    print_r($inputArray2);
    echo('<br>'.'<br>'.'<br>'. 'Array diff:');
    print_r(array_diff($inputArray, $inputArray2));


    echo('<br>'.'<br>'.'<br>'.'array_fill_keys' . '<br>');

    print_r(array_fill_keys($numberArray, 'number'));

    echo('<br>'.'<br>'.'<br>'.'array_fill' . '<br>');

    print_r(array_fill(-5, 5,'Número'));

    echo(strtoupper('<br>'.'<br>'.'<br>'.'array_filter TO REVIEW'));

    echo('<br>'.'<br>'.'<br>'.'array_filter' . '<br>');

    print_r(array_filter($mixedArray));

    echo('<br>'.'<br>'.'<br>'.'array_flip' . '<br>');

    echo('<br>');
    echo('Flipped ');
    print_r(array_flip($randomNumArray1));

    echo('<br>'.'<br>'.'<br>'.'array_intersect_assoc' . '<br>');

    print_r(array_intersect_assoc($numberArray, $numberArray2 ));

    echo('<br>'.'<br>'.'<br>'. 'Original Arrays:'. '<br>');
    print_r($randomNumArray1);
    echo('<br>');
    print_r($randomNumArray2);
    echo('<br>');

    echo('<br>'.'<br>'.'<br>'.'array_intersect' . '<br>');

    print_r(array_intersect($numberArray, $numberArray2 ));

    echo('<br>'.'<br>'.'<br>'.'array_intersect_assoc' . '<br>');

    print_r(array_intersect_assoc($numberArray, $numberArray2 ));

    echo('<br>'.'<br>'.'<br>'.'array_key_exists' . '<br>');
    echo("If 'fiRst' exists on inputArray, array_key_exist will print false or true:" . "<br>");

    if (array_key_exists('fiRst', $inputArray)) {
        echo "The 'fiRst' element is in the array";
    } else {
        echo "It doesn't exists";
    };

    echo('<br>'.'<br>'.'<br>'. "array_key_first gives back the first key of a given array, for ex, in our array  ['fiRst' => '1', 'sEconD' => '2', 'ThirD' => '3',  'foRTh']; it will print 'fiRst'"
     . '<br>');

    print_r(array_key_first($inputArray));

    echo('<br>');
    echo('<strong>Array_key_last</strong> will print the last key of an array. ');
    echo('<br>');
    echo('While <strong>Array_keys</strong> will print all the keys of an array. ');
    echo('<br>');
    print_r(array_keys($inputArray));

    echo('<br>');

    echo('<br>'.'<br>'.'<br>'.'<strong>array_map</strong>' . '<br>');

    print_r(array_map(null, $animalArray, $colorArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_merge</strong>' . '<br>');

    print_r(array_merge($animalArray, $colorArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_multisort</strong>' . '<br>');

    print_r(array_multisort($animalArray, $colorArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_pad</strong>' . '<br>');

    print_r(array_pad($animalArray, 10, 0));

    echo('<br>'.'<br>'.'<br>'.'<strong>Array_pop</strong>' . '<br>');

    print_r($animalArray);
    echo('<br>'.'<br>'.'Popped value:'.'<br>');
    print_r(Array_pop($animalArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_product</strong>' . '<br>');

    print_r($numberArray);
    echo('=> And the product of the array is =  ');
    print_r(array_product($numberArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_push</strong> will push values into array. Array before push: ' . '<br>');

    print_r($animalArray);
    echo('<br>'.'<br>'. 'Array after push :');
    array_push($animalArray, 'giraffe', 'monkey');
    print_r($animalArray);

    echo('<br>'.'<br>'.'<br>'.'<strong>array_rand</strong>' . '<br>');

    print_r(array_rand($animalArray, 5));

    echo('REVIEW ARRAY_REDUCE');

    echo('<br>'.'<br>'.'<br>'.'<strong>array_replace</strong>' . '<br>');
    
    print_r(array_replace($inputArray, $inputArray2));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_reverse</strong>' . '<br>');
    
    print_r(array_reverse($inputArray));


    echo('<br>'.'<br>'.'<br>'.'<strong>array_search</strong>, similar to in_array() but finds the key instead of the value' . '<br>');
    
    print_r(array_search('1', $inputArray));

    echo('<br>'.'<br>'.'<br>'.'<strong>array_shift</strong>' . '<br>');
    
    array_shift($inputArray);

    print_r($inputArray);

    echo('<br>'.'<br>'.'<br>'.'<strong>array_slice</strong>' . '<br> original array : ' . '<br> ');
    print_r($numberArray);
    echo('<br>'.'<br>'.'<br>'. 'sliced array : ');
    print_r(array_slice($numberArray, 3));
    echo('<br>'.'<br>'.'<br>');
    echo('array_splice does the same but replaces the sliced part with something else, no need to test it.');
    echo('<br>');
    echo('array_sum calculates the sum of the values of an array, like product_array.');



    ?> 
</div>