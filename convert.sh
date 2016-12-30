
cd $1

# If a .zip file is present, unzip it. Otherwise move on to conversion
if [ -e *.zip ]
then
unzip -j *.zip    # unzip into working directory without subdirectories
fi

# convert all .md files pass in conversion option on $2
for filename in *.md
do
pandoc $filename -f markdown -t html -o $(echo $filename | cut -f 1 -d '.').html
done

# zip all files in working directory into an archive excluding any .zip files
zip converted.zip * -x *.zip

cd ../../..
