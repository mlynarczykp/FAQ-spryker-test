# Display FAQ in a web browser

### FAQ in Yves

Frequently Asked Questions can be viewed in a web browser at:
http://yves.at.spryker.local/faq

## Basic Use

All Frequently Asked Questions are displayed here. The user cannot interact with them. Any changes made to the database will be automatically reflected here.

### CAUTION

The module has none functional unit test.

## Technical documentation

The FAQ module is located in src/Pyz/Yves

Data transfer between Yves and Zed is done by schema (src/Pyz/Shared/Faq/Transfer):

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
