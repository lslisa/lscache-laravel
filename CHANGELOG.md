# Changelog

## v1.1.0
- Add support for X-LiteSpeed-Vary header

## v1.0.1
- Do not return X-LiteSpeed-Cache-Control if the default max-age is set to `0`
- Update the README.md to reflect the X-LiteSpeed-Cache-Control change

## v1.0.0
- Added support for setting LSCache Cache-Control via a middleware
- Added support for purging the cache via a Facade
