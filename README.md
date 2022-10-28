# Empisoft_MessageQueue

This extension provides CLI command for Magento 2 to update queue pill.

## Why this extension?

There is no easy way to safely restart queue consumer process. There is a pending [PR](https://github.com/magento/magento2/pull/31495) that adds command to do this.
To restart the queue process just add the command `bin/magento queue:poison-pill:update` to the deployment process.
