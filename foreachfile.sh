ls > list.txt
#!/bin/bash
Totallines=wc -l list.txt
for i in {1..$totallines}
do
rm head -n $i list.txt | tail -1
done