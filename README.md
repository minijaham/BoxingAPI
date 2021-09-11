# BoxingAPI
:shrug:

# How to use
```php
use minijaham\Boxing\Boxing;

# Get Hits of the player
Boxing::getInstance()->getHits(Player $player); # Returns int

# Reset Player's hits
Boxing::getInstance()->removeHits(Player $player);
```
