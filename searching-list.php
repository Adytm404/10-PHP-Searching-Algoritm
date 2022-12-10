1. Binary Search: 
<?php
function binarySearch($arr, $x) 
{ 
    $low = 0; 
    $high = count($arr) - 1; 
  
    while ($low <= $high) { 
  
        $mid = floor(($low + $high) / 2); 
  
        if($arr[$mid] == $x) { 
            return true; 
        } 
  
        if ($x < $arr[$mid]) { 
            $high = $mid -1; 
        } 
        else { 
            $low = $mid + 1; 
        } 
    } 
  
    return false; 
} 
  
$arr = array(1, 3, 5, 7, 8, 9); 
$x = 5; 
if(binarySearch($arr, $x)) { 
    echo "Element Found\n"; 
} 
else { 
    echo "Element Not Found\n"; 
} 
?>

2. Linear Search: 
<?php
function linearSearch($arr, $x) 
{ 
    $n = sizeof($arr); 
    for($i = 0; $i < $n; $i++) { 
        if($arr[$i] == $x) { 
            return $i; 
        } 
    } 
    return -1; 
} 
  
$arr = array(1, 10, 30, 15); 
$x = 30; 
$index = linearSearch($arr, $x); 
if($index == -1) { 
    echo "Element Not Found\n"; 
} 
else { 
    echo "Element Found At Index: " . $index; 
} 
?>

3. Jump Search: 
<?php
function jumpSearch($arr, $x) 
{ 
    $n = sizeof($arr); 
    $step = sqrt($n); 
  
    $prev = 0; 
    while ($arr[min($step, $n)-1] < $x) 
    { 
        $prev = $step; 
        $step += sqrt($n); 
        if ($prev >= $n) 
            return -1; 
    } 
  
    while ($arr[$prev] < $x) 
    { 
        $prev++; 
  
        if ($prev == min($step, $n)) 
            return -1; 
    } 
  
    if ($arr[$prev] == $x) 
        return $prev; 
  
    return -1; 
} 
  
$arr = array(0, 1, 1, 2, 3, 5, 8, 13, 21, 
              34, 55, 89, 144, 233, 377, 610); 
$x = 55; 
$index = jumpSearch($arr, $x); 
if ($index == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $index; 
?>

4. Interpolation Search: 
<?php
function interpolationSearch($arr, $x) 
{ 
    $lo = 0; 
    $hi = (count($arr) - 1); 
  
    while ($lo <= $hi && $x >= $arr[$lo] && $x <= $arr[$hi]) 
    { 
        if ($lo == $hi) 
        { 
            if ($arr[$lo] == $x) return $lo; 
            return -1; 
        } 
        $pos = $lo + ((($hi - $lo) / ($arr[$hi] - $arr[$lo])) * ($x - $arr[$lo])); 
        $pos = round($pos); 
  
        if ($arr[$pos] == $x) 
            return $pos; 
  
        if ($arr[$pos] < $x) 
            $lo = $pos + 1; 
  
        else
            $hi = $pos - 1; 
    } 
    return -1; 
} 
  
$arr = array(10, 12, 13, 16, 18, 19, 20, 21, 22, 23, 
              24, 33, 35, 42, 47); 
$x = 35; 
$index = interpolationSearch($arr, $x); 
if ($index != -1) 
    echo "$x found at index " . $index; 
else
    echo "$x not found in the array"; 
?>

5. Exponential Search: 
<?php
function exponentialSearch($arr, $n, $x) 
{ 
    if ($arr[0] == $x) 
        return 0; 
  
    $i = 1; 
    while ($i < $n && $arr[$i] <= $x) 
        $i = $i*2; 
  
    return binarySearch($arr, $i/2, min($i, $n), $x); 
} 
  
function binarySearch($arr, $l, $r, $x) 
{ 
    if ($r >= $l) 
    { 
        $mid = $l + ($r - $l)/2; 
  
        if ($arr[$mid] == $x) 
            return $mid; 
  
        if ($arr[$mid] > $x) 
            return binarySearch($arr, $l, $mid-1, $x); 
  
        return binarySearch($arr, $mid+1, $r, $x); 
    } 
    return -1; 
} 
  
$arr = array(2, 3, 4, 10, 40); 
$x = 10; 
$n = sizeof($arr); 
$result = exponentialSearch($arr, $n, $x); 
if($result == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $result; 
?>

6. Fibonacci Search: 
<?php
function FibonacciSearch($arr, $x, $n) 
{ 
    $fibMMm2 = 0; 
    $fibMMm1 = 1; 
    $fibM = $fibMMm2 + $fibMMm1; 
  
    while ($fibM < $n) 
    { 
        $fibMMm2 = $fibMMm1; 
        $fibMMm1 = $fibM; 
        $fibM  = $fibMMm2 + $fibMMm1; 
    } 
  
    $offset = -1; 
  
    while ($fibM > 1) 
    { 
        $i = min($offset+$fibMMm2, $n-1); 
  
        if ($arr[$i] < $x) 
        { 
            $fibM  = $fibMMm1; 
            $fibMMm1 = $fibMMm2; 
            $fibMMm2 = $fibM - $fibMMm1; 
            $offset = $i; 
        } 
  
        else if ($arr[$i] > $x) 
        { 
            $fibM  = $fibMMm2; 
            $fibMMm1 = $fibMMm1 - $fibMMm2; 
            $fibMMm2 = $fibM - $fibMMm1; 
        } 
  
        else return $i; 
    } 
  
    if ($fibMMm1 && $arr[$offset+1] == $x) 
        return $offset+1; 
  
    return -1; 
} 
  
$arr = array(10, 22, 35, 40, 45, 50, 
              80, 82, 85, 90, 100); 
$x = 85; 
$n = sizeof($arr); 
$index = FibonacciSearch($arr, $x, $n); 
if ($index == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $index; 
?>

7. Ternary Search: 
<?php
function ternarySearch($arr, $l, $r, $x) 
{ 
    if ($r >= $l) 
    { 
        $mid1 = $l + ($r - $l)/3; 
        $mid2 = $mid1 + ($r - $l)/3; 
  
        if ($arr[$mid1] == $x)  
            return $mid1; 
  
        if ($arr[$mid2] == $x)  
            return $mid2; 
  
        if ($arr[$mid1] > $x)  
            return ternarySearch($arr, $l, $mid1-1, $x); 
  
        if ($arr[$mid2] < $x)  
            return ternarySearch($arr, $mid2+1, $r, $x); 
  
        return ternarySearch($arr, $mid1+1, $mid2-1, $x); 
    } 
    return -1; 
} 

$arr = array(2, 3, 4, 10, 40); 
$x = 10; 
$n = sizeof($arr); 
$index = ternarySearch($arr, 0, $n-1, $x); 
if ($index == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $index; 
?>

8. Jump Search: 
<?php
function jumpSearch($arr, $x, $n) 
{ 
    $step = sqrt($n); 
  
    $prev = 0; 
    while ($arr[min($step, $n)-1] < $x) 
    { 
        $prev = $step; 
        $step += sqrt($n); 
        if ($prev >= $n) 
            return -1; 
    } 
  
    while ($arr[$prev] < $x) 
    { 
        $prev++; 
  
        if ($prev == min($step, $n)) 
            return -1; 
    } 
  
    if ($arr[$prev] == $x) 
        return $prev; 
  
    return -1; 
} 
  
$arr = array(2, 3, 4, 10, 40); 
$x = 10; 
$n = sizeof($arr); 
$index = jumpSearch($arr, $x, $n); 
if ($index == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $index; 
?>

9. Block Search: 
<?php
function blockSearch($arr, $x, $n) 
{ 
    $blockSize = sqrt($n); 
  
    $start = 0; 
    $end = $blockSize; 
  
    while ($arr[min($end, $n)-1] < $x) 
    { 
        $start = $end; 
        $end += $blockSize; 
        if ($start > $n) 
            return -1; 
    } 
  
    while ($arr[$start] < $x) 
    { 
        $start++; 
        if ($start == min($end, $n)) 
            return -1; 
    } 
  
    if ($arr[$start] == $x) 
        return $start; 
  
    return -1; 
} 
  
$arr = array(2, 3, 4, 10, 40); 
$x = 10; 
$n = sizeof($arr); 
$index = blockSearch($arr, $x, $n); 
if ($index == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $index; 
?>

10. Recursive Binary Search: 
<?php
function binarySearch($arr, $l, $r, $x) 
{ 
    if ($r >= $l) 
    { 
        $mid = $l + ($r - $l)/2; 
        if ($arr[$mid] == $x) 
            return $mid; 
        if ($arr[$mid] > $x) 
            return binarySearch($arr, $l, $mid-1, $x); 
        return binarySearch($arr, $mid+1, $r, $x); 
    } 
    return -1; 
} 
  
$arr = array(2, 3, 4, 10, 40); 
$x = 10; 
$n = sizeof($arr); 
$result = binarySearch($arr, 0, $n-1, $x); 
if($result == -1) 
    echo "Element Not Found\n"; 
else
    echo "Element Found At Index: " . $result; 
?>
