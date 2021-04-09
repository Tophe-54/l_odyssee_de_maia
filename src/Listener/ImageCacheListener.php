<?php


namespace App\Listener;


use App\Entity\Album;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Vich\UploaderBundle\Event\Event;

class ImageCacheListener
{

    /**
     * @var CacheManager
     */
    private $cacheManager;

    public function __construct(CacheManager $cacheManager)
    {
        $this->cacheManager = $cacheManager;
    }
    
    public function onVichUploaderPreRemove(Event $event)
    {
        $object = $event->getObject();
        $mapping = $event->getMapping();

        if (! $object instanceof Album) {
            return;
        }

        $this->cacheManager->remove($mapping->getUriPrefix() . '/' . $object->getImageName());
    }

}