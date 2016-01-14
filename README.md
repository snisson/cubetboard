cubetboard
==========

Cubet board is an open source pin based social photo sharing website that allows users to create and manage their image collections.

Additional configuration after installation
--------------
You must be able to send email for registration verification and password reset. If you install `sendmail`

```
apt-get install sendmail
```
then you should be able to do so without further configuration as long as you replace references to `info@pinterestclone` with `info@[your.domain.com]` as follows:

```
sed -i 's/info@pinterestclone/info@[your.domain.com]/' [web root]/application/controllers/password.php
sed -i 's/info@pinterestclone/info@[your.domain.com]/' [web root]/application/controllers/board.php
sed -i 's/info@pinterestclone/info@[your.domain.com]/' [web root]/application/controllers/invite.php
```