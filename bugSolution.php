This solution uses a semaphore to ensure that only one process can access and decrement `$available` at a time, resolving the race condition.

```php
<?php

// Initialize the semaphore
$sem = sem_get(key: ftok(__FILE__, 'a'), 1, 0666, 0);

function decrementAvailable() {
  global $available, $sem;

  // Acquire the semaphore
  sem_acquire($sem);

  if ($available > 0) {
    $available--;
    // ... rest of the code that uses the resource ...
  }

  // Release the semaphore
  sem_release($sem);
}

$available = 1;
decrementAvailable();
decrementAvailable(); // Concurrent calls are now safe

?>
```