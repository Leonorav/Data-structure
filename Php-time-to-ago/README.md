# Simple php-time-to-age 
Time to ago is used for Faster comprehension at the expense of accuracy.
>
Sure, you might not know exactly when that was, but the assumption is that the exact time isn't necessary. It's simply reducing accuracy for faster processing.
>
Using:
>
Posting date: 
```php 
$date = new DateTime('2021-10-31');
```

Return date to text:
```php 
to_time_ago($date->format('Y-m-d'))
```
