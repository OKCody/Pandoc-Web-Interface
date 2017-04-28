# Pandoc_Web_Interface

## Assumptions

All scripts were created with the following assumptions in mind.  Your mileage may vary.

OS Assumptions

Distributor ID:	Ubuntu
Description:	Ubuntu 16.04.1 LTS
Release:	16.04
Codename:	xenial

## Setup

This tool has several dependencies,

- [apache2](https://httpd.apache.org/)
- [php7.0](https://secure.php.net/)
- [pandoc](http://pandoc.org/)
- [wkhtmltopdf](https://wkhtmltopdf.org/)
- [xvfb](https://www.x.org/archive/X11R7.6/doc/man/man1/Xvfb.1.xhtml)
- [zip](http://www.info-zip.org/)

from within Pandoc-Web-Interface/ run,

```
bash dependencies.sh
```
to install them. This only needs to be done once. 

Next run,

```
bash setup.sh
```

To move necessary files to where they need to be. This needs to be done each time a new version of the Pandoc-Web-Interface is downloaded. 

If Pandoc-Web-Interface is being reinstalled, run the following before setup.sh

```
bash cleanup.sh
```

## Use

Upload individual .md files or a .zip archive of multiple .md files and associated assets to be converted to a number of output formats serverside.

To apply a custom stylesheet include it in the .zip archive and select the "custom" radio button. Selecting radio buttons other than "custom" will override a user-supplied stylesheet.

Converted files are zipped and directly downloaded in browser

## Operation

Conversiton to PDF is done using the tool [WKHTMLTOPDF](http://wkhtmltopdf.org/):

`.md -> Pandoc -> .html (w/ CSS) -> WKHTMLTOPDF -> .pdf`

## License

This repository is licensed under the [MIT License](license.md).
