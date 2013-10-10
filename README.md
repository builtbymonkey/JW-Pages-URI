# JW Pages URI

Adds the functionality of Title URL to Pages URI

## Usage

**NOTE: This accessory will not work, until you complete the following.**

Enabling for channels that aren't meant to (or don't exclusively) contain pages can cause edge-case issues as all entries from enabled channels will be made pages.

To enable a channel, add its ID to the array in the beginning of `acc.jw_pages_uri.php`.
```php
private $channel_ids = array(1, 4);
```

Otherwise, you can add the IDs to a config variable in `config.php` (or your config bootstrap if you use one).
```php
$config['jw_pages_uri_channel_ids'] = array(1, 4);
```

## License

The MIT License (MIT)

Copyright (c) 2013 Jeremy Worboys jw@jeremyworboys.com

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
