<?php

use Kirby\Http\Response;

class FaviconMap
{
    public bool $validlegacy = false;
    public bool $validmodern = false;

    private string $icoDestinationfile;
    private $icoSVG;
    private array $modernVersions = [];

    protected static $instance;

    public static function instance(Kirby\Cms\Site $site)
    {
        return static::$instance ??= new static($site);
    }

    public function __construct(Kirby\Cms\Site $site)
    {
        if ($site->faviconsvg()->isNotEmpty()) {
            $this->icoSVG = $site->faviconsvg()->toFile()->realpath();
            $this->validmodern = true;
        }

        if ($site->faviconimage()->isNotEmpty() && $site->faviconimage()->toFile()) {
            $sourcepath = $site->faviconimage()->toFile()->realpath();
            $pathinfo = pathinfo($sourcepath);
            $destinationpath = $pathinfo['dirname'];
            $destinationfilename = $pathinfo['filename'] . '.ico';

            $this->icoDestinationfile = $destinationpath . '/' . $destinationfilename;

            if (!file_exists($this->icoDestinationfile)) {
                $ico_lib = new PHP_ICO($sourcepath, [[16, 16], [32, 32], [64, 64]]);
                $ico_lib->save_ico($this->icoDestinationfile);
            }

            $this->modernVersions['icon-16'] = $site->faviconimage()->toFile()->crop(16, 16, [
                'format' => 'png'
            ])->realpath();

            $this->modernVersions['icon-32'] = $site->faviconimage()->toFile()->crop(32, 32, [
                'format' => 'png'
            ])->realpath();

            $this->modernVersions['apple-180'] = $site->faviconimage()->toFile()->crop(180, 180, [
                'format' => 'png'
            ])->realpath();

            $this->modernVersions['icon-192'] = $site->faviconimage()->toFile()->crop(192, 192, [
                'format' => 'png'
            ])->realpath();

            $this->modernVersions['icon-512'] = $site->faviconimage()->toFile()->crop(512, 512, [
                'format' => 'png'
            ])->realpath();

            $this->modernVersions['icon-1080'] = $site->faviconimage()->toFile()->crop(1080, 1080, [
                'format' => 'png'
            ])->realpath();

            $this->validlegacy = true;
        }
    }

    public function manifest()
    {
        return [
            'icons' => [
                ['src' => '/icon-192.png', 'type' => 'image/png', 'sizes' => '192x192'],
                ['src' => '/icon-512.png', 'type' => 'image/png', 'sizes' => '512x512'],
                ['src' => '/icon-1080.png', 'type' => 'image/png', 'sizes' => '1080x1080'],
            ],
        ];
    }

    public function favicon()
    {
        if ($this->icoDestinationfile) {
            return Response::file($this->icoDestinationfile, [
                'content-type' => 'image/vnd.microsoft.icon'
            ]);
        }
        return null;
    }

    public function faviconsvg()
    {
        if ($this->icoSVG) {
            return Response::file($this->icoSVG);
        }
        return null;
    }

    public function apple180()
    {
        if (isset($this->modernVersions['apple-180'])) {
            return Response::file($this->modernVersions['apple-180']);
        }
        return null;
    }

    public function icon192()
    {
        if (isset($this->modernVersions['icon-192'])) {
            return Response::file($this->modernVersions['icon-192']);
        }
        return null;
    }

    public function icon16()
    {
        if (isset($this->modernVersions['icon-16'])) {
            return Response::file($this->modernVersions['icon-16']);
        }
        return null;
    }

    public function icon32()
    {
        if (isset($this->modernVersions['icon-32'])) {
            return Response::file($this->modernVersions['icon-32']);
        }
        return null;
    }

    public function icon512()
    {
        if (isset($this->modernVersions['icon-512'])) {
            return Response::file($this->modernVersions['icon-512']);
        }
        return null;
    }
    
    public function icon1080()
    {
        if (isset($this->modernVersions['icon-1080'])) {
            return Response::file($this->modernVersions['icon-1080']);
        }
        return null;
    }
}
