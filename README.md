# Kirby3 Favicons

This plugin provides helpers to render modern and legacy favicon file for your website.
Simply add the following fields to your site blueprint and upload the images.

```yaml
fields:
  faviconsvg:
    type: files
    label: Favicon SVG
    uploads:
      parent: site
      template: svg
    max: 1

  faviconimage:
    type: files
    label: Favicon Legacy
    uploads:
      parent: site
      template: favicon
    max: 1
```

## What's happening
The Plugin provides a route for the favicon.ico and converts the uploaded legacy image to an .ico image.
For modern purpose, an SVG and multiple versions of a PNG file are rendered. Additionally, a manifest.webmanifest route is added to map the right images.

## Helpers for the Template
To output the favicons, add the 'favicons' snippet to the header of your site and see if the result matches your needs.
