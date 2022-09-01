# Ability to vote up and down on FAQ

### Display FAQ with vote option

Frequently Asked Questions can be viewed in a web browser at: http://yves.at.spryker.local/faq

## Basic Use

In addition to the question and its answer, the user sees 2 buttons that allow him to decide whether a given question and its answer are sufficient (Vote Up) or not (Vote Down). Moreover, the number of votes of other users is visible

### CAUTION

The module has not been completed.

Voting is not possible - the error RequestException (500) is shown.

User validation is not completed

The module has none functional unit test.

## Technical documentation

The pyz_faq table has been modified and second table, pyz_faq_votes, has been created for voting. In addition, a relation with the table spy_customer has been created

```xml
<?xml version="1.0"?>
<database xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
          name="zed"
          xsi:noNamespaceSchemaLocation="http://static.spryker.com/schema-01.xsd"
          namespace="Orm\Zed\Faq\Persistence"
          package="src.Orm.Zed.Faq.Persistence">

    <table name="pyz_faq" phpName="PyzFaq">
        <column name="id_question" required="true" type="INTEGER" autoIncrement="true" primaryKey="true"/>
        <column name="question" required="true" type="VARCHAR" size="100"/>
        <column name="answer" type="VARCHAR" size="255"/>
        <column name="is_active" default="true" type="BOOLEAN"/>
    </table>

    <table name="pyz_faq_votes" phpName="PyzFaqVotes">
        <column name="id_vote" required="true" type="INTEGER" autoIncrement="true" primaryKey="true"/>
        <column name="id_faq" type="INTEGER" primaryKey="true"/>
        <column name="id_customer" type="INTEGER" primaryKey="true"/>
        <column name="votes_up" type="INTEGER"/>
        <column name="votes_down" type="INTEGER"/>

        <foreign-key foreignTable="pyz_faq" onDelete = "cascade">
            <reference local="id_faq" foreign="id_question"/>
        </foreign-key>

        <foreign-key foreignTable="spy_customer" onDelete = "cascade">
            <reference local="id_customer" foreign="id_customer"/>
        </foreign-key>
    </table>
</database>

```
