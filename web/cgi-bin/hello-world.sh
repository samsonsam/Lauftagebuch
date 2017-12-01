#!/bin/sh

# Neues Shellskript ...


echo "Content-type: text/html\n\n";

echo "<HTML>"
echo "<HEAD>"
echo "<TITLE>Hello, world!</TITLE>"
echo "</HEAD>"
echo "<BODY>"
echo "<H1>Hello, world!</H1>"
echo "<H2>Die aktuelle Systemzeit ist"
echo $(date -u)
echo "</H2>"
echo "</BODY>"
echo "</HTML>"

exit 0
