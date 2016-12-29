
cd $1
for filename in *.md
do
pandoc $filename -f markdown -t html -o $filename.html
done
cd ../../..
