# contentfulphp

First I have been following the lesson at https://the-example-app-php.contentful.com/courses/hello-contentful/lessons/content-management to understand some of the basics for PHP.

Following the guide found at https://www.contentful.com/developers/docs/php/tutorials/getting-started-with-contentful-and-php/ I first installed the SDK using composer.

I initialized the client with my token and space id: 

$client = new \Contentful\Delivery\Client(
    '<access_token>',
    '<space_id>'
);

