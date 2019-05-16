# Arweave-Upload-WP
A Wordpress plugin that allows the user to upload their Arweave keyfile (JSON), and back up every published Wordpress post to the Arweave. It is thus backed up to the permanent web.
# Installation
To install, simply clone the repository, and make it into a zip file using your favorite software. In Wordpress settings, go to Plugins, and click 'Add New' and click 'Upload Plugin'. Upload the zipped folder and you are good to go!

NOTE: If this is unsuccessful, simply unzip the folder yourself. Place its contents in wp-content/plugins. The resulting hierarchy should be wp-content/plugins/Arweave-Upload-WP.

# Data Preservation
With this plugin, Wordpress posts will be posted to the permanant web. To retrieve them, you will need the transaction ID of each upload. 

Uninstalling the plugin will remove the transaction data from the Wordpress database. This means you will not be able to find
the arweave transaction ID associated with each post. Make sure to save the transaction IDs somewhere if you want to find them in the future.


