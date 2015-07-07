<?php namespace Jejje\Gravatar;

use Illuminate\Support\Facades\Config;

/**
 * Class Image
 *
 * @package Jejje\Gravatar
 */
class Image {

    /**
     * Get the global size if none is passed as argument
     *
     * Don't forget to vendor:publish
     * @return int
     */
    public function getGlobalSize()
    {
        $size = Config::get('jejje.gravatar.config.default_gravatar_size');

        return $size;
    }

    /**
     * Method to reuse the Gravatar image url
     *
     * @param $id
     * @param $size
     * @return string
     */
    private function gravatarImage($id, $size)
    {
        return "http://www.gravatar.com/avatar/$id?s=$size";
    }

    /**
     * Method to reuse Gravatar profile url
     *
     * @param $id
     * @return string
     */
    private function gravatarProfile($id)
    {
        return "http://www.gravatar.com/$id";
    }

    /**
     * This method is used to retrive url to users Gravatar
     * Will use default size from config file unless size
     * argument is passed.
     *
     * @param $email
     * @param null $size
     * @return string
     */
    public function getImageUrl($email, $size = null)
    {
        if(is_null($size))
        {
            $size = $this->getGlobalSize();
        }

        $gravatar_hash = $this->getHash($email);

        return $this->gravatarImage($gravatar_hash, $size);
    }

    /**
     * Will return url to requested user Gravatar.
     *
     * @param $email
     * @return string
     */
    public function getProfileUrl($email)
    {
        $gravatar_hash = $this->getHash($email);

        return $this->gravatarProfile($gravatar_hash);
    }

    /**
     * Will return a Gravatar image with link
     * to profile of the requested user.
     *
     * @param $email
     * @param null $size
     * @return string
     */
    public function getImageWithLinkToProfile($email, $size = null)
    {
        if(is_null($size))
        {
            $size = $this->getGlobalSize();
        }

        $gravatar_hash = $this->getHash($email);

        $image = $this->gravatarImage($gravatar_hash, $size);
        $link = $this->gravatarProfile($gravatar_hash);

        $image_with_link = "<a href='$link'><img src='$image'></a>";

        return $image_with_link;
    }

    /**
     * Returns the hash of an e-mail trimmed
     * if there was any spaces in the submitted
     * e-mail.
     *
     * @param $email
     * @return string
     */
    public function getHash($email)
    {
        $gravatar_hash = md5(strtolower(trim($email)));

        return $gravatar_hash;
    }


}