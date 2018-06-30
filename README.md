# contentfulphp

First I have been following the lesson at https://the-example-app-php.contentful.com/courses/hello-contentful/lessons/content-management to understand some of the basics for PHP.

Following the guide found at https://www.contentful.com/developers/docs/php/tutorials/getting-started-with-contentful-and-php/ I first installed the SDK using composer.

I loaded the autoloader:
require_once 'vendor/autoload.php';

I initialized the client with my token and space id: 

$client = new \Contentful\Delivery\Client(
    '<access_token>',
    '<space_id>'
);

The first problem I run into was the certificate required for the Curl connection.
I am using XAMPP so I had to install the certificate and modify the php.ini.

As first example I just connected to the space created with the sample blog and I dumped the results with 

$entries = $client->getEntries();

var_dump($entries);

It worked easy and it took a very short time thanks to the guides! :)

This is the file first.php 




