This code suffers from a potential race condition.  If two requests happen simultaneously, they could both check `$available` as true and proceed to decrement it, resulting in a negative count.

```php
<?php

function decrementAvailable() {
  global $available;
  if ($available > 0) {
    $available--;
    // ... rest of the code that uses the resource ...
  }
}

$available = 1;
decrementAvailable();
decrementAvailable(); // Race condition happens here if called concurrently

?>
```