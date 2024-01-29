===============================================================================
INSERT-COIN                                          Pls toss tokens, over here
===============================================================================

insert-coin's a lightweight & simple image-uploading and URL-shortening
service. It doesn't have bells and whistles like accounts or cookies, 
JS or tracking... which you might consider good things.
I think they're awful.


----------------------------------------
USAGE
----------------------------------------
Drop everything in a directory on your web-server (root, non-root, it doesn't
matter).
Then, create two directories-- "p/" and "u/"-- that are accessible and
modifiable by your web-server user.
Finally, make a "res/config.php" file (from "res/config.example.php").

If you're using a web-server that supports .htaccess files (Apache and the
ilk), then you should be good from here. Otherwise, you should manually block
the files referenced in "/.htaccess" and "res/.htaccess"-- for sample config
of Lighttpd, read "docs/lighttpd.txt".



----------------------------------------
BORING STUFF
----------------------------------------
License is AGPLv3-- check COPYING.txt.
Author is Jenga Phoenix <jadedctrl@posteo.at>
The flagship instance was https://coinsh.red, until it moved to distribute-coin.
Sauce is at https://hak.xwx.moe/jadedctrl//insert-coin
