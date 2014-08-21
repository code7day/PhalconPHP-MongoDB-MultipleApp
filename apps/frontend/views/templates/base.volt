<!DOCTYPE html>
<!--[if lt IE 7 ]>    <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>       <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>       <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>       <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>{{ seoTitle }}</title>
<meta name="description" content="{{ seoDescription }}">
<meta name="keywords" content="{{ seoKeywords }}">
<meta name="author" content=""/>
<meta name="description" content=""/>
<meta name="copyright" content=""/>
<meta name="google-site-verification" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">
{{ assets.outputCss('remoteStyles') }}
{{ assets.outputCss('localStyles') }}
<!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
{{ javascript_include("js/thirdParty/modernizr.custom.js") }}
{% block head %}
{% endblock %}
</head>
<body>
{% block content %}
{% endblock %}
{% block modals %}
{% endblock %}
{{ assets.outputJs('remoteJs') }}
{{ assets.outputJs('localJs') }}
{% block extraJS %}
{% endblock %}
</body>
</html>