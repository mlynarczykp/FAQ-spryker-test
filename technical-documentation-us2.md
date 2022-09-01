# Managing FAQ with RestApi

### FaqRestApi

The task of this module, at the user story 2 stage, is managing Frequently Asked Questions by a Postman.

## Basic Use

The user must be authorizated to managing FAQ. To do this the bearer token is needed. The user can get it by writing:

1) endpoint:
   http://glue.de.spryker.local/access-tokens
2) Body -> raw:
   username e-mail and password. For example:

```
   {
   "data": {
           "type": "access-tokens",
           "attributes": {
               "username": "spencor.hopkin@spryker.com",
            "password": "change123"
           }
       }
   }
   ```

3) Choose method POST and click Send.

The acquired token must be entered for each endpoint in Authorization->Token. Bearer Token Type must be choosed.

## Endpoints

1) Get all frequently asked questions with answers and status:
   http://glue.de.spryker.local/faq

Method GET must be choosed

3) Get One frequently asked question by typing its id:
   http://glue.de.spryker.local/faq/1

Method GET must be choosed

After faq/ must be typed id number of the question.

3) Create new question, its answer and status:
   http://glue.de.spryker.local/faq

Method POST must be choosed and in Body->raw data have to be given. For example:

```
{
"data": {
        "type": "faq",
        "attributes": {
            "question": "Write here your question",
            "answer": "Write here your answer",
            "isActive": "set here status of question (true/false)"
            }
        }
}
```

4) Update question, its answer and status:
   http://glue.de.spryker.local/faq/6

After faq/ must be typed id number of the question.

Method PATCH must be choosed and in Body->raw a new data have to be given. Like as in Creating.

5) Delete question, its answer and status:
   http://glue.de.spryker.local/faq/6

After faq/ must be typed id number of the question. Method DELETE must be choosed.

### CAUTION

The module has none functional unit test.

## Technical documentation

The FAQ Rest Api module is located in src/Pyz/Glue

Data transfer between Glue and Zed is done by schema (src/Pyz/Shared/Faq/Transfer):

```xml
<?xml version="1.0"?>
<transfers xmlns="spryker:transfer-01"
           xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
           xsi:schemaLocation="spryker:transfer-01 http://static.spryker.com/transfer-01.xsd">
    <transfer name="Faq">
        <property name="idQuestion" type="int"/>
        <property name="question" type="string"/>
        <property name="answer" type="string"/>
        <property name="isActive" type="boolean"/>
    </transfer>
</transfers>
```

In the console, type:

docker/sdk cli

console transfer:generate
