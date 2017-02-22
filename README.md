# dicegame-class

### Base on below Interview Question

Your company would like to develop an online dice game. The game rules are as below:

1. The game contains 4 players. 
2. Each player will have 6 dice in their dice up. 
3. Each round all players will roll their dice at the same time.
4. All dice with number 1 on top side will be passed to player on his right hand (the right most player will pass the dice to left most player)
5. All dice with number 6 on top side will be removed from their dice cup.
6. All players roll their dice again to start next round. 7. The player who first emptied their dice cup (could be more than 1 player) is winner(s).

You are required to write a PHP code to simulate this game and print out the result of each round until
winner(s) is found.

### Example of output:

***Round 1***

__After dice rolled:__

Player A: 3, 4, 5, 6, 1, 1

Player B: 5, 4, 5, 4, 3, 1

Player C: 6, 6, 6, 3, 2, 4

Player D: 5, 1, 3, 2, 4, 1

__After dice moved/removed:__

Player A: 3, 4, 5, 1 ,1

Player B: 5, 4, 5, 4, 3, 1, 1

Player C: 3, 2, 4, 1

Player D: 5, 3, 2, 4

**Round 2:**

__After dice rolled:__

Player A: 2, 3, 6, 2, 6

Player B: 6, 6, 6, 4, 1, 3

Player C: 3, 2, 1, 6

Player D: 6, 6, 1, 2

__After dice moved/removed:__

Player A: 2, 3, 2, 1

Player B: 4, 1, 3

Player C: 3, 2, 1

Player D: 2, 1


(Repeat until winner(s) is found)
