<?php

/* layout.html */
class __TwigTemplate_f6ba37b674bcff70d1edecf47ef9a364dae8947ee480753e60eb8821bc412ab6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<body>
<header>header</header>
<content>
";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 8
        echo "</content>
<footer>footer</footer>
</body>
</html>";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  28 => 8,  26 => 5,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<body>
<header>header</header>
<content>
{% block content %}

{% endblock %}
</content>
<footer>footer</footer>
</body>
</html>", "layout.html", "D:\\wamp64\\www\\QGFrame\\app\\views\\layout.html");
    }
}
