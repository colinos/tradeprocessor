# tradeprocessor

This is a currency market trade processor.

Trade messages take the JSON form:
{"userId": "134256", "currencyFrom": "EUR", "currencyTo": "GBP", "amountSell": 1000, "amountBuy": 747.10, "rate": 0.7471, "timePlaced" : "24-JAN-15 10:27:44", "originatingCountry" : "FR"}

Trade messages should be POST'd for processing to the endpoint, which is:
messages.php

json-post-tester.php is for testing the POSTing procedure to the above endpoint.

Trade messages are written to a database. Database configuration should be set in:
config.php


There are two frontends for rendering the market trade data:

alltrades.php simply outputs all trade messages stored in the database

graph.php shows the relative value of EUR that has been used to buy each of the other currencies.
This could obviously be extended to show the same representation when currencies other than EUR have been used for buying.
