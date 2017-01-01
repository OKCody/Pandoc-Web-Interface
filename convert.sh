# $1 = path to unique session directory
# $2 = path to selected stylesheet
# $3 = html extension
# $4 = pdf extension
# $5 = docx extension


cd $1

# If a .zip file is present, unzip it. Otherwise move on to conversion
if [ -e *.zip ]
then
  unzip -j *.zip    # unzip into working directory without subdirectories
fi

# If an example stylesheet has been selected, remove all styleshees in favor of selected
echo $2 > status.txt
if [ $2 != "none" ]
then
  rm *.css    # if a example stylesheet has been selected remove all uploaded stylesheets
  cp ../../$2 stylesheet.css
fi


for output in $3 $4 $5
do
  # convert all .md files passed in conversion option on $2
  # apply only the first .css file returned by ls. Pandoc only allows 1 .css file
  for filename in *.md
  do
  pandoc $filename -f markdown -c $(ls *.css | head -1 ) -o $(echo $filename | cut -f 1 -d '.').$output
  done
done
# zip all files in working directory into an archive excluding any .zip files
zip converted.zip * -x *.zip
