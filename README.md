# PHP Race Condition Example

This repository demonstrates a race condition in a simple PHP function that manages a shared resource.  The `decrementAvailable()` function attempts to decrement a counter (`$available`) before using a resource. However, without proper locking mechanisms, concurrent requests can lead to incorrect behavior where the counter goes below zero, resulting in resource exhaustion or unexpected errors.

The solution provided demonstrates how to use semaphores to prevent the race condition and ensure safe access to the shared resource.