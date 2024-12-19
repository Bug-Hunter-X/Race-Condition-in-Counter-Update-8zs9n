To fix this race condition, we can use atomic operations to ensure that the counter update is performed as a single, indivisible operation.  This prevents other threads from interfering during the increment process.  PHP's `atomic` library (or similar) can be leveraged for this.

```php
<?php
require 'atomic.php'; // Assume this is an atomic counter library.

$counter = new Atomic(0);

function updateCounter() {
  global $counter;
  $counter->increment(); // Atomic increment
}

// ...rest of the code...
?>
```
Alternatively, use a database with transaction support, or implement a locking mechanism using semaphores or mutexes.