#### Library for downloading and sending leads of the company `PIC`

##### TargetLeadsSender.

*Installation and deployment*

- For **DEV** - environment, make a call in the root directory of the project:

``` composer install --no-dev```

For combat:

``` composer install ```

- The installer must pull up all the necessary `vendor` packages.

#### Sync commands

- To download the missing leads from target-mail, you should add a script to the crown:

```/usr/bin/php download.php```

- To send to PIC

```/usr/bin/php send.php```

- Loading interval time from target-mail - from 30 to 60 minutes

- The time of sending leads to the PIC is at the discretion of the company
