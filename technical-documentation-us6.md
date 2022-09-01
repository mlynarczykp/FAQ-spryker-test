# Import data from the csv file to database table

### Faq data importer

The task of this module, at the user story 6 stage, is to import data with Frequently Asked Questions from csv file to
database table.

## Basic Use

All data is located in data/import/local/common . User can easily manage data here.

Example of faq.csv
````
question,answer,is_active
What is PHP?,"PHP stands for PHP: Hypertext Preprocessor. This confuses many people because the first word of the acronym is the acronym. This type of acronym is called a recursive acronym",true
````

To import data to database table user has to type in console:
1) docker/sdk cli
2) console:data:import:faq
