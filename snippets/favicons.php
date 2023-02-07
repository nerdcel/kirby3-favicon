<?php if (site()->faviconmap()->validlegacy) : ?>
    <link rel="shortcut icon" sizes="any" href="/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon-16x16.png">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="manifest" href="/manifest.webmanifest"><?php endif; ?>
<?php if (site()->faviconmap()->validmodern) : ?>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml"><?php endif; ?>
