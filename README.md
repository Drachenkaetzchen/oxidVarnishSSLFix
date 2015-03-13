This module fixes the problem where OXID does not recognise SSL when the varnish cache is active.

# Installation

- Create a new directory in modules called `oxidVarnishSSLFix`. Copy and paste the name if in doubt.
- Copy the contents of this archive to `modules/oxidVarnishSSLFix`

If you prefer using git, you can simply clone this module into your modules directory:

```
cd modules
git clone https://github.com/felicitus/oxidVarnishSSLFix.git
```

Yes, I'm not going to provide a `COPY_THIS directory`, as I find the concept utterly awkward.

# Technical Information

The varnish cache sets the `HTTP_X_FORWARDED_PROTO` header, which includes the requested protocol from the user.
OXID does not honor this setting and always falls back generating http:// urls for resources.

This module extends the `oxConfig::_checkSsl` method and adds an additional check for `HTTP_X_FORWARDED_PROTO`. If
`HTTP_X_FORWARDED_PROTO` is set to `https`, it sets OXID into SSL mode.

There is a fragment of code in OXID CE which checks if `HTTP_X_FORWARDED_SERVER` is set to `ssl`, however,
`HTTP_X_FORWARDED_SERVER` is probably the wrong variable to check.