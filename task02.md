git clone http://3b63f0ef8c9495ee:4f4f84f4@git.interviewed.com/z-1893326-6b8a37/php-1326-scraper


The project assignment is to create a private package using a popular web scraping library (Guzzle). The scraper will extract data from a specific newspaper archive site and structure the results. Your work will be added as a Composer dependency in a web framework such as Laravel. However, the customer has not yet decided which PHP framework or database to use, so your work must be modular and framework-agnostic.

Features:

    Scraper extracts data from http://archive-grbj-2.s3-website-us-west-1.amazonaws.com/
    Extracts the following fields:
        Article Title
        Article Date
        Article URL
        Author Name
        Author Twitter Handle
        Author Bio
        Author URL
    Ignores articles without a specific author e.g. "Staff"
    Package returns an array of authors with a child array of their articles. e.g.


$data = array( 
    array( 
        'authorName' => 'John Doe', 
        'articles' => array( 
            array(
                'articleUrl' => 'http://example.com', 
                'articleDate' => '2001-01-01' 
            ), 
            array(),
            array()            
        )
    ), 
    array(),
    array()
);

Code Structure:

    Use the repository below as your starting point. Feel free to improve on it however you see fit.
    To make debugging easier, modify debug.php to accept command line support for "=" as argument/value separator.
    Accept command-line arguments for debugging. For example: php debug.php --concurrency=2 --maxResultsPerAuthor=40
        startDate (YYYY-MM-DD)
        endDate (YYYY-MM-DD)
        maxResultsPerAuthor
        concurrency (number of parallel web requests)
        wait (seconds to wait before starting a new request)
    All functionality should be encapsulated in the /src folder and follow standard package conventions
    You can otherwise modify the project however you like and add Composer dependencies

Deliverables:

    Push your commits to the private repository.
