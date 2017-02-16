# example-asterisk-ami
Example of use [asterisk-bundle](https://github.com/ryzhov/asterisk-bundle) in symfony console application
```bash
$ composer create-project ryzhov/example-asterisk-ami
-- configure ami socket parameters here --
asterisk_host (localhost): 127.0.0.1
asterisk_ami_port (5038): 
asterisk_ami_username (ami):
asterisk_ami_secret (pass4ami):
--

$ cd example-asterisk-ami
$ php bin/console event-handler
```
