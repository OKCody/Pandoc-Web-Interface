# $1 = path to unique session directory
# $2 = path to selected stylesheet
# $3 = html extension
# $4 = pdf extension
# $5 = docx extension

# Move into unique directory created for a given session
cd $1

# If a .zip file is present in unique directory, unzip it. Otherwise move on
#   to conversion.
if [ -e *.zip ]     # "if a .zip file exists, do this . . ."
then
  unzip -j *.zip    # unzip into working directory without subdirectories
fi

# If an example stylesheet has been selected, remove all styleshees in favor of that which is selected.
if [ $2 != "none" ]  # If something other than default state is selected, do this . . .
then
  rm *.css    # If an example stylesheet has been selected, remove all uploaded stylesheets
  cp ../../$2 stylesheet.css
fi

# Repeat conversion for each of the selected output formats passed in on variables $3 - $5.
for output in $3 $4 $5
do
  # Convert all .md files found in directory $1.
  # Apply only the first .css file returned by ls. Pandoc only allows 1 .css
  #   file. Others will be ignored.
  # User should condense multiple stylesheets into one as a programatic approach
  #   would willy nilly overwrite CSS attributes.
  for filename in *.md
  do
  pandoc $filename -f markdown -c $(ls *.css | head -1 ) -o $(echo $filename | cut -f 1 -d '.').$output
  done
done

# zip all files in working directory into an archive excluding any .zip files
zip converted.zip * -x *.zip
