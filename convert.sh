
cd $1

# If a .zip file is present, unzip it. Otherwise move on to conversion
if [ -e *.zip ]
then
unzip -j *.zip    # unzip into working directory without subdirectories
fi

for output in $2 $3 $4
do
  # convert all .md files passed in conversion option on $2
  for filename in *.md
  do
  pandoc $filename -f markdown -o $(echo $filename | cut -f 1 -d '.').$output
  done
done
# zip all files in working directory into an archive excluding any .zip files
zip converted.zip * -x *.zip

cd ../../..
