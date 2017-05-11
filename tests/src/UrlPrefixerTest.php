<?php
namespace tests;

use Germania\UrlPrefixer\UrlPrefixer;
use \InvalidArgumentException;

class UrlPrefixerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provideUrls
     */
    public function testUsage( $prefix_url, $url, $custom_prefix, $expected )
    {

        $sut = new UrlPrefixer( $prefix_url );

        $result = $sut( $url, $custom_prefix );

        $this->assertEquals($expected, $result);
    }



    public function provideUrls() {

        $custom_prefix = 'https://api.test.com';

        return array(
            [ '',                     '/path',              null, '/path' ],
            [ 'http://test.com',      '/path',              null, 'http://test.com/path' ],
            [ 'http://test.com/path', '/to/resource',       null, 'http://test.com/path/to/resource' ],
            [ 'http://test.com/path', '#top',               null, '#top' ],
            [ 'http://test.com/path', '//dist/styles.css',  null, '//dist/styles.css' ],
            [ 'http://test.com',      '//domain.net',       null, '//domain.net' ],
            [ 'http://test.com',      'http://domain.net',  null, 'http://domain.net' ],
            [ 'http://test.com',      'https://domain.net', null, 'https://domain.net' ],

            // Custom URL prefixes
            [ '',                     '/path',              $custom_prefix, $custom_prefix. '/path' ],
            [ 'http://test.com',      '/path',              $custom_prefix, $custom_prefix. '/path' ],
            [ 'http://test.com/path', '/to/resource',       $custom_prefix, $custom_prefix. '/to/resource' ],
            [ 'http://test.com/path', '#top',               $custom_prefix, '#top' ],
            [ 'http://test.com/path', '//dist/styles.css',  $custom_prefix, '//dist/styles.css' ],
            [ 'http://test.com',      '//domain.net',       $custom_prefix, '//domain.net' ],
            [ 'http://test.com',      'http://domain.net',  $custom_prefix, 'http://domain.net' ],
            [ 'http://test.com',      'https://domain.net', $custom_prefix, 'https://domain.net' ],
        );
    }

}

