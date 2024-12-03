<script type="text/javascript">
    var tarteaucitronForceLanguage = 'fr';
</script>
<script type="text/javascript" src="//www.revelateur.fr/external_cookies/tarteaucitron.min.js"></script>
<script type="text/javascript">
    tarteaucitron.init({
        "hashtag": "#tarteaucitron",
        "highPrivacy": false,
        "orientation": "bottom",
        "adblocker": false,
        "showAlertSmall": false,
        "cookieslist": true,
        "removeCredit": true
    });
</script>
<script type="text/javascript">
    const matomoSiteID = {!! json_encode(env('MATOMO_SITE_ID')) !!};
    if (matomoSiteID) {
        tarteaucitron.user.matomoId = matomoSiteID;
        tarteaucitron.user.matomoHost = '//piwik.revelateur.fr/';
        (tarteaucitron.job = tarteaucitron.job || []).push('matomo');
    }
</script>
