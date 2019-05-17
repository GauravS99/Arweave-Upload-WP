# Arweave-Upload-WP
A Wordpress plugin that allows Wordpress admins to upload their Arweave keyfile (JSON), and use their AR (Cryptocurrency that supports Arweave transactions) to back up every published (or revised) Wordpress post to the Arweave, and thus on the permanent web. For more information about Arweave, visit https://www.arweave.org/ to find out more.

# Installation
To install, simply clone the repository, and make it into a zip file using your favorite software. In Wordpress settings, go to Plugins, and click 'Add New' and click 'Upload Plugin'. Upload the zipped folder and you are good to go!

NOTE: If this is unsuccessful, simply unzip the folder yourself. Place its contents in wp-content/plugins. The resulting hierarchy should be wp-content/plugins/Arweave-Upload-WP.

# Instructions
To begin using the plugin after it is activated, navigate to the new Arweave page and make sure to choose an Arweave keyfile to work with, and specify the Arweave node hostname or IP address. If you are unsure, leave it as the default. Every time a post is published (or revised), a backup will be uploaded to the Arweave. You can see the transaction IDs associated with each post through the table available in the Arweave page. If there are revisions for a post, their transaction IDs will also be added to the same box. So, a single post may have one or more transaction IDs associated with it. 

# Data Preservation
With this plugin, Wordpress posts will be posted to the permanant web. To retrieve them, you will need the transaction ID of each upload. 

Uninstalling the plugin will remove the transaction data from the Wordpress database. This means you will not be able to find
the arweave transaction ID associated with each post. Make sure to save the transaction IDs somewhere if you want to find them in the future.


