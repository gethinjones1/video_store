# Video Store

Valid film name inputs: 

matrix, dumbo, bond, et, FF10.

API GET request to laravel local server. Parse a string in the url in the following format: 

http://127.0.0.1:8000/api/rentals?rentals=matrix,3,dumbo,2,bond,3,et,5,FF10,1

WHERE rentals=FILNAME,DURATION,FILMNAME,DURATION etc.

Write a system that can build a `statement`, when given `rentals`.

When there are 3 regular movie rentals for 1, 2 and 3 days respectively, the statement looks like:

```
Rental Record for Customer Name
  Crazynotes  £2.0
  Teeth  £2.0
  The Web  £3.5
You owe £7.5
You earned 3 frequent renter points
```

## Regular Movies

Are £2 for the first 2 days, and £1.50 for each day thereafter.

You earn 1 frequent renter point no matter the length of the rental.

## New Release Movies

Are £3 per day.

You earn 1 frequent renter point for a 1 day rental, and 2 for any rental of 2 days or more.

## Childrens Movies

Are £1.50 for the first 3 days, and £1.50 for each day thereafter.

You earn 1 frequent renter point no matter the length of the rental.
