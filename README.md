# Pandoc_Web_Interface

## Use

Upload individual .md files or a .zip archive of multiple .md files and associated assets to be converted to a number of output formats serverside.

To apply a custom stylesheet include it in the .zip archive and select the "custom" radio button. Selecting radio buttons other than "custom" will override a user-supplied stylesheet.

Converted files are zipped and directly downloaded in browser

## Operation

Conversiton to PDF is done using the tool [WKHTMLTOPDF](http://wkhtmltopdf.org/):

`.md -> Pandoc -> .html (w/ CSS) -> WKHTMLTOPDF -> .pdf`

## License

Interface is licensed under the [MIT License](license.md).
