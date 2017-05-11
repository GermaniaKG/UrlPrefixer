<?php
namespace Germania\UrlPrefixer;

class UrlPrefixer
{
    /**
     * @var string
     */
    public $default_prefix;

    /**
     * @var array
     */
    public $protocols = [];

    /**
     * @var string
     */
    protected $protocols_regex;


    /**
     * @param string $default_prefix Default base URL to work with. Default: empty
     */
    public function __construct( $default_prefix = '', $protocols = ['http', 'https' ])
    {
        $this->default_prefix = $default_prefix;

        $this->setProtocols( $protocols );
    }


    /**
     * @param  array $protocols Array with protocol schemes, e.g. `['http', 'https']`
     * @return self             Fluid interface
     */
    public function setProtocols( array $protocols )
    {
        $this->protocols = $protocols;

        $joined_protocols = join('|', $this->protocols);
        $this->protocols_regex = "!((". $joined_protocols."):)?\/\/!i";

        return $this;
    }


    /**
     * Prefixes a given URL with a base URL, if it is not absolute.
     *
     * @param  string $url             The URL to prefix
     * @param  string $custom_prefix   Custom base URL, defaults to null
     * @return string                  Prefixed URL
     */
    public function __invoke( $url, $custom_prefix = null)
    {
        $base_url = is_null($custom_prefix)
                  ? $this->default_prefix : $custom_prefix;

        return preg_match($this->protocols_regex, $url)
        ? $url : $base_url . $url;
    }
}
