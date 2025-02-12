# Redirect based on User-Agent
A simple plugin to redirect based on User-Agent, all blacklisted user agents won't be redirected to target URL but instead shown a custom page.

- Requires [YOURLS](https://yourls.org) `1.92` and above.

This was heavily influenced by [yourls-ban-useragent](https://github.com/8Mi-Tech/yourls-ban-useragent) at the end it became totally new plugin.

I replaced most functions and added following: 
- A info page for blacklisted user-agents to download supported browser.
- When saving blacklist, the list is validated.
- Blacklist is used, in the original plugin it was disabled.
- Possibility to add custom page for blacklisted user agent `other-ua-custom.php` where you could have different thumbnails depending on the target of the Short URL. 
