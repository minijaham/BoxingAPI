# BoxingAPI
:shrug:
Simple API for a boxing game, ig!
Inspired by: https://www.youtube.com/watch?v=zUGIf27H-1M

# How to use
```php
use minijaham\Boxing\Boxing;

# Get Hits of the player
Boxing::getInstance()->getHits(Player $player); # Returns int

# Reset Player's hits
Boxing::getInstance()->removeHits(Player $player);

# Calculate amount of hits dealt - received
Boxing::getInstance()->calculateHits(Player $firstPlayer, Player $secondPlayer); # Returns int
```
