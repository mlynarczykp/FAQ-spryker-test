# Faq module in Zed

The task of this module, at the user story 1 stage, is to have by a user a dedicated UI thanks to which user will be
able to manage the Frequently Asked Questions.

## Basic Use

The user must log in to the back office using the default e-mail and password, which can be changed later.

Back office website:
http://backoffice.de.spryker.local/faq/list

Default e-mail:
admin@spryker.com

Default password:
change123

The visible table on the main page consists of the question and its id, answer to the question, question status and
possible actions.

Possible actions:

1) Editing the question, answer and its status. Editing will take the user to a specially prepared page, where he can
   make the necessary changes.
2) Completely removing the question and its answer without asking if the user is sure of his decision.

In the upper right corner of the table there is a Create button. It will take the user to the page, where he will be
able to create a completely new question, its answer and determine the question status.

On the left side of the bar there is an icon in the shape of a question mark and the name "Faq". It is a navigation
shortcut with the option to select a FAQ list or to create a new question with an answer.

All Frequently Asked Questions are stored in database.

### CAUTION

The module does not have a fully functional unit test.

## Technical documentation

Schema of a table in a database:
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
</database>
.```

