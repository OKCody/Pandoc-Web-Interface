
cd $1
for filename in *.md
do
pandoc $filename -f markdown -t html -o $(echo $filename | cut -f 1 -d '.').html
done
cd ../../..
