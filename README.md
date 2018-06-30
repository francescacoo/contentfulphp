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

The result is nothing fancy, but it is taking the data from my space!
It worked easy and it took a very short time thanks to the guides! :)

This is the file first.php 

I continued working following the guides.
Let's print just the description of an entry retrieved by id:

$entry = $client->getEntry('5rWcJ6BiM0S2e0g4gUciia');
echo $entry->getDescription();

Great.
Trying to understand now a bit more of how this works, I moved to read the API documentation, starting from https://www.contentful.com/developers/docs/references/content-delivery-api/ 
I will then create a space and work on it on my own to see if I have learnt properly!

THE DOG SHOP :)

First I created my space in the WebConsole and created the content model.
I will keep it simple for the example, so I will just have the items with few standard fields and categories.
I will learn in this way how to use references.

After creating the item types as categories and items, I moved to insert some content.
I found super easy to add categories to my items! I wasn't sure how the content-model worked for relationships (yep, still used to the old style CMS), but seeing it in action helped me to understand it!

I added my categories and inserted few items.
First thing I want to try and display the categories in a top menu.

I used a query to retrieve only the categories:

$query = new \Contentful\Delivery\Query();
$query->setContentType('category');

$products = $client->getEntries($query);

and then cycled through the result.
It works :)

I will now make the links display the products for the selected category.






