<?php

// sortranje arraya
# sort()

$fruits = array('0'=> 'limun', 
	            'a'=> 'naranca', 
	             1 => 'banana',
	            'b'=> 'jabuka' );

print_r($fruits);

sort($fruits);

echo "sortirano<br>";
print_r($fruits);

# rsort()
echo "<br>";
rsort($fruits);
echo "rsort() sortirano<br>";
print_r($fruits);

// ubijam varijablu jer sam sortiranjem 
// izgubio kljuceve 
unset($fruits); 

$fruits = array(0=> 'limun', 
	            'a'=> 'naranca', 
	             1 => 'banana',
	            'b'=> 'jabuka',
	            2=>'grejp' );

#asort()
echo "<br>";
asort($fruits);
echo "asort() sortirano<br>";
print_r($fruits);

#arsort()
echo "<br>";
arsort($fruits);
echo "arsort() sortirano<br>";
print_r($fruits);

unset($fruits); 

$fruits = array(0=> 'limun', 
	            'a'=> 'naranca', 
	             1 => 'banana',
	            'b'=> 'jabuka',
	            2=>'grejp' );

#ksort()
echo "<br>";
ksort($fruits);
echo "ksort() sortirano<br>";
print_r($fruits);

#krsort()
echo "<br>";
krsort($fruits);
echo "krsort() sortirano<br>";
print_r($fruits);

?>