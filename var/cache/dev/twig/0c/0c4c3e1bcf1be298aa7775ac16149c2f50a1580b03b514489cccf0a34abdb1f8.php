<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* header.html.twig */
class __TwigTemplate_7e506480fcbaea422fe95cdf58f28bc8e19b81fde3e11a34360a8372c8ea4bcc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "header.html.twig"));

        // line 1
        echo "<!-- Topbar -->
<nav class=\"navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow\">

    <!-- Sidebar Toggle (Topbar) -->
    <button id=\"sidebarToggleTop\" class=\"btn btn-link d-md-none rounded-circle mr-3\">
        <i class=\"fa fa-bars\"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class=\"d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search\">
        <div class=\"input-group\">
            <input type=\"text\" class=\"form-control bg-light border-0 small\" placeholder=\"Search for...\"
                   aria-label=\"Search\" aria-describedby=\"basic-addon2\">
            <div class=\"input-group-append\">
                <button class=\"btn btn-primary\" type=\"button\">
                    <i class=\"fas fa-search fa-sm\"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class=\"navbar-nav ml-auto\">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class=\"nav-item dropdown no-arrow d-sm-none\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"searchDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-search fa-fw\"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class=\"dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in\"
                 aria-labelledby=\"searchDropdown\">
                <form class=\"form-inline mr-auto w-100 navbar-search\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control bg-light border-0 small\"
                               placeholder=\"Search for...\" aria-label=\"Search\"
                               aria-describedby=\"basic-addon2\">
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-primary\" type=\"button\">
                                <i class=\"fas fa-search fa-sm\"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class=\"nav-item dropdown no-arrow mx-1\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"alertsDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-bell fa-fw\"></i>
                <!-- Counter - Alerts -->
                <span class=\"badge badge-danger badge-counter\">";
        // line 56
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["alerts"]) || array_key_exists("alerts", $context) ? $context["alerts"] : (function () { throw new RuntimeError('Variable "alerts" does not exist.', 56, $this->source); })())), "html", null, true);
        echo "</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class=\"dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"alertsDropdown\">
                <h6 class=\"dropdown-header bg-danger border-danger\">
                    ";
        // line 62
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Alerts Center", [], "messages");
        // line 63
        echo "                </h6>
                ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["alerts"]) || array_key_exists("alerts", $context) ? $context["alerts"] : (function () { throw new RuntimeError('Variable "alerts" does not exist.', 64, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["alert"]) {
            // line 65
            echo "                <a class=\"dropdown-item d-flex align-items-center\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["alert"], "link", [], "any", false, false, false, 65), "html", null, true);
            echo "\">
                    <div class=\"mr-3\">
                        <div class=\"icon-circle bg-primary\">
                            <i class=\"fas fa-";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["alert"], "type", [], "any", false, false, false, 68), "html", null, true);
            echo " text-white\"></i>
                        </div>
                    </div>
                    <div>
                        <span class=\"font-weight-bold\">";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["alert"], "message", [], "any", false, false, false, 72), "html", null, true);
            echo "</span>
                    </div>
                </a>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['alert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class=\"nav-item dropdown no-arrow mx-1\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"messagesDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-envelope fa-fw\"></i>
                <!-- Counter - Messages -->
                <span class=\"badge badge-danger badge-counter\">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class=\"dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"messagesDropdown\">
                <h6 class=\"dropdown-header\">
                    Message Center
                </h6>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_1.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-success\"></div>
                    </div>
                    <div class=\"font-weight-bold\">
                        <div class=\"text-truncate\">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class=\"small text-gray-500\">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_2.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class=\"small text-gray-500\">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_3.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-warning\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class=\"small text-gray-500\">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"https://source.unsplash.com/Mv9hjnEUHR4/60x60\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-success\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class=\"small text-gray-500\">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class=\"dropdown-item text-center small text-gray-500\" href=\"#\">Read More Messages</a>
            </div>
        </li>

        <div class=\"topbar-divider d-none d-sm-block\"></div>

        <!-- Nav Item - User Information -->
        <li class=\"nav-item dropdown no-arrow\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"userDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <span class=\"mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold\">";
        // line 151
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 151, $this->source); })()), "user", [], "any", false, false, false, 151), "html", null, true);
        echo "</span>
                <img class=\"img-profile rounded-circle\"
                     src=\"/img/undraw_profile.svg\">
            </a>
            <!-- Dropdown - User Information -->
            <div class=\"dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"userDropdown\">
                <span class=\"dropdown-item\">
                    <small class=\"font-weight-bold\">";
        // line 159
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 159, $this->source); })()), "roles", [], "any", false, false, false, 159), "html", null, true);
        echo "</small>
                </span>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Profile
                </a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-cogs fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Settings
                </a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-list fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Activity Log
                </a>
                <div class=\"dropdown-divider\"></div>
                <a class=\"dropdown-item\" href=\"/logout\" data-toggle=\"modal\" data-target=\"#logoutModal\">
                    <i class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\"></i>
                    ";
        // line 176
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Logout", [], "messages");
        // line 177
        echo "                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- Logout Modal-->
<div class=\"modal fade\" id=\"logoutModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">";
        // line 190
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Ready to Leave?", [], "messages");
        echo "</h5>
                <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
            </div>
            <div class=\"modal-body\">";
        // line 195
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select \"Logout\" below if you are ready to end your current session.", [], "messages");
        echo "</div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">";
        // line 197
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", [], "messages");
        echo "</button>
                <a class=\"btn btn-primary\" href=\"logout\">";
        // line 198
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Logout", [], "messages");
        echo "</a>
            </div>
        </div>
    </div>
</div>

<!-- End of Topbar -->";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 198,  280 => 197,  275 => 195,  267 => 190,  252 => 177,  250 => 176,  230 => 159,  219 => 151,  142 => 76,  132 => 72,  125 => 68,  118 => 65,  114 => 64,  111 => 63,  109 => 62,  100 => 56,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Topbar -->
<nav class=\"navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow\">

    <!-- Sidebar Toggle (Topbar) -->
    <button id=\"sidebarToggleTop\" class=\"btn btn-link d-md-none rounded-circle mr-3\">
        <i class=\"fa fa-bars\"></i>
    </button>

    <!-- Topbar Search -->
    <form
        class=\"d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search\">
        <div class=\"input-group\">
            <input type=\"text\" class=\"form-control bg-light border-0 small\" placeholder=\"Search for...\"
                   aria-label=\"Search\" aria-describedby=\"basic-addon2\">
            <div class=\"input-group-append\">
                <button class=\"btn btn-primary\" type=\"button\">
                    <i class=\"fas fa-search fa-sm\"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class=\"navbar-nav ml-auto\">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class=\"nav-item dropdown no-arrow d-sm-none\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"searchDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-search fa-fw\"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class=\"dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in\"
                 aria-labelledby=\"searchDropdown\">
                <form class=\"form-inline mr-auto w-100 navbar-search\">
                    <div class=\"input-group\">
                        <input type=\"text\" class=\"form-control bg-light border-0 small\"
                               placeholder=\"Search for...\" aria-label=\"Search\"
                               aria-describedby=\"basic-addon2\">
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-primary\" type=\"button\">
                                <i class=\"fas fa-search fa-sm\"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class=\"nav-item dropdown no-arrow mx-1\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"alertsDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-bell fa-fw\"></i>
                <!-- Counter - Alerts -->
                <span class=\"badge badge-danger badge-counter\">{{alerts|length}}</span>
            </a>
            <!-- Dropdown - Alerts -->
            <div class=\"dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"alertsDropdown\">
                <h6 class=\"dropdown-header bg-danger border-danger\">
                    {% trans %}Alerts Center{% endtrans %}
                </h6>
                {%for alert in alerts %}
                <a class=\"dropdown-item d-flex align-items-center\" href=\"{{alert.link}}\">
                    <div class=\"mr-3\">
                        <div class=\"icon-circle bg-primary\">
                            <i class=\"fas fa-{{alert.type}} text-white\"></i>
                        </div>
                    </div>
                    <div>
                        <span class=\"font-weight-bold\">{{alert.message}}</span>
                    </div>
                </a>
                {%endfor%}
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class=\"nav-item dropdown no-arrow mx-1\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"messagesDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"fas fa-envelope fa-fw\"></i>
                <!-- Counter - Messages -->
                <span class=\"badge badge-danger badge-counter\">7</span>
            </a>
            <!-- Dropdown - Messages -->
            <div class=\"dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"messagesDropdown\">
                <h6 class=\"dropdown-header\">
                    Message Center
                </h6>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_1.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-success\"></div>
                    </div>
                    <div class=\"font-weight-bold\">
                        <div class=\"text-truncate\">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class=\"small text-gray-500\">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_2.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class=\"small text-gray-500\">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"/img/undraw_profile_3.svg\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-warning\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class=\"small text-gray-500\">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class=\"dropdown-item d-flex align-items-center\" href=\"#\">
                    <div class=\"dropdown-list-image mr-3\">
                        <img class=\"rounded-circle\" src=\"https://source.unsplash.com/Mv9hjnEUHR4/60x60\"
                             alt=\"...\">
                        <div class=\"status-indicator bg-success\"></div>
                    </div>
                    <div>
                        <div class=\"text-truncate\">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class=\"small text-gray-500\">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class=\"dropdown-item text-center small text-gray-500\" href=\"#\">Read More Messages</a>
            </div>
        </li>

        <div class=\"topbar-divider d-none d-sm-block\"></div>

        <!-- Nav Item - User Information -->
        <li class=\"nav-item dropdown no-arrow\">
            <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"userDropdown\" role=\"button\"
               data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <span class=\"mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold\">{{ user.user }}</span>
                <img class=\"img-profile rounded-circle\"
                     src=\"/img/undraw_profile.svg\">
            </a>
            <!-- Dropdown - User Information -->
            <div class=\"dropdown-menu dropdown-menu-right shadow animated--grow-in\"
                 aria-labelledby=\"userDropdown\">
                <span class=\"dropdown-item\">
                    <small class=\"font-weight-bold\">{{user.roles}}</small>
                </span>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-user fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Profile
                </a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-cogs fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Settings
                </a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fas fa-list fa-sm fa-fw mr-2 text-gray-400\"></i>
                    Activity Log
                </a>
                <div class=\"dropdown-divider\"></div>
                <a class=\"dropdown-item\" href=\"/logout\" data-toggle=\"modal\" data-target=\"#logoutModal\">
                    <i class=\"fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400\"></i>
                    {%trans%}Logout{%endtrans%}
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- Logout Modal-->
<div class=\"modal fade\" id=\"logoutModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">{%trans%}Ready to Leave?{%endtrans%}</h5>
                <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
            </div>
            <div class=\"modal-body\">{%trans%}Select \"Logout\" below if you are ready to end your current session.{%endtrans%}</div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">{%trans%}Cancel{%endtrans%}</button>
                <a class=\"btn btn-primary\" href=\"logout\">{%trans%}Logout{%endtrans%}</a>
            </div>
        </div>
    </div>
</div>

<!-- End of Topbar -->", "header.html.twig", "/home/Betandeal/PhpstormProjects/newback/templates/header.html.twig");
    }
}
