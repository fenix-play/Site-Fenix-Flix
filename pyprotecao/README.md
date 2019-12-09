*** ALL CREDITS TO ORIGINAL DEV.GABRIEL SILVA *** : https://github.com/silvagabriel62

# pyprotecao
This is a simple online tool to obfuscate python codes and "hide" their sources.\
It was designed to be a revival of _pyobfuscate.tk_ project (rest in peace). Entirely developed in PHP.

### Website
See this tool working at: https://www.fenixflix.tk/pyprotecao

### Important information
Please note that **this is not an advanced encryption tool** and it's intended only to prevent your code from being read by those who don't know programming very well. _It is quite possible to decrypt the codes using basic methods, so do not use this tool to hide important information._

### Differences from other obfuscators
The main differential between **pyprotecao** and other obfuscators is that this is a completely online and simple tool. It runs inside a PHP server, which can be accessed through any browser or device, not needing python or any compiler installed. Besides that, the encoded files are 80% smaller than other tools.

### How it works?
We use simple Base64 encoding and some string manipulations to obfuscate the files. When loaded, the code is previously translated and interpreted by python client before starting.

### Source files reference
* `result` - Obfuscated files are stored temporarily into this folder. Includes a _index.php_ file which redirects to the main page, preventing users from accessing the file list.
* `upload` - Same as _result_ folder, but stores the user uploaded files instead.
* `.htaccess` - Apache server settings (friendly URLs and error handles).
* `autocron.php` - Cron job file, ran every hour by the server. Deletes all the files uploaded and temporarily stored at _result_ and _upload_ folders.
* `bg.png`, `favicon.ico`, `loading.gif`, `main.css`, `ogicon.png` - Website assets as images and stylesheet. Do not matter.
* `error.php` - A very basic unexpected error page. Aesthetics only.
* `index.php` - Main website page, with the form which selects the file.
* **`process.php`** - **The real deal here**. This is the script which uploads, obfuscates and processes the files.

### Credits
Made with love by [Fenix Flix](https://www.fenixflix.tk), in Portugal.\
Support: suporte@fenixflix.tk


      *** ALL CREDITS TO ORIGINAL DEV.GABRIEL SILVA *** : https://github.com/silvagabriel62


