<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {% block 'head' %}
        {% endblock %}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <title>{% block 'title' %}{% endblock %}</title>
        <style>
            font-degrade-nav{
                background-image: linear-gradient(90deg, rgba(255,207,0,1) 0%, rgba(231,71,220,1) 100%);
                background-clip: text;               
                -webkit-background-clip: text;
                color: transparent;
                padding-bottom: 10px;
                font-size: 20px;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="fundo">

        <!--{% if user.is_authenticated %}
            <nav style="background-color: #444;" class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="#"><span class="font-degrade-nav">FreelaWay</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Encontrar job's</a>
                        </li>
                    </ul>
                </div>
            </nav>
        {% endif %}-->


        {% block 'body' %}{% endblock %}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>