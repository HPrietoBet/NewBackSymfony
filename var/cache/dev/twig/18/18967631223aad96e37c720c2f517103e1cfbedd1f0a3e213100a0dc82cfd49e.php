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

/* home/index.html.twig */
class __TwigTemplate_ecf103a70a95ef1e61a9b12e0f78a9832983795f3ca0a4ac32e84e81465e26c5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 3, $this->source); })()), "html", null, true);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<body id=\"page-top\">

<!-- Page Wrapper -->
<div id=\"wrapper\">

    <!-- Sidebar -->
    ";
        // line 12
        $this->loadTemplate("navegacion.html.twig", "home/index.html.twig", 12)->display($context);
        // line 13
        echo "    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id=\"content-wrapper\" class=\"d-flex flex-column\">

        <!-- Main Content -->
        <div id=\"content\">

            <!-- header -->
            ";
        // line 22
        $this->loadTemplate("header.html.twig", "home/index.html.twig", 22)->display($context);
        // line 23
        echo "            <!-- End of header -->


            <!-- Begin Page Content -->
            <div class=\"container-fluid\">

                <!-- Content Row -->
                <div class=\"row\">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-primary shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                                            ";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Players", [], "messages");
        // line 40
        echo "                                        </div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["totalplayers"]) || array_key_exists("totalplayers", $context) ? $context["totalplayers"] : (function () { throw new RuntimeError('Variable "totalplayers" does not exist.', 41, $this->source); })()), "html", null, true);
        echo "</div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-users fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-success shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                                            ";
        // line 58
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Active Campaigns", [], "messages");
        // line 59
        echo "                                        </div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["countercampaigns"]) || array_key_exists("countercampaigns", $context) ? $context["countercampaigns"] : (function () { throw new RuntimeError('Variable "countercampaigns" does not exist.', 60, $this->source); })()), "html", null, true);
        echo "</div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-ad fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-info shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">
                                            ";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Commisions generated", [], "messages");
        // line 78
        echo "                                        </div>
                                        <div class=\"row no-gutters align-items-center\">
                                            <div class=\"col-auto\">
                                                <div class=\"h5 mb-0 mr-3 font-weight-bold text-gray-800\">";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["totalmoney"]) || array_key_exists("totalmoney", $context) ? $context["totalmoney"] : (function () { throw new RuntimeError('Variable "totalmoney" does not exist.', 81, $this->source); })()), "now", [], "any", false, false, false, 81), "html", null, true);
        echo "</div>
                                            </div>
                                            <div class=\"col\">
                                                <div class=\"progress progress-sm mr-2\">
                                                    <div class=\"progress-bar bg-info\" role=\"progressbar\"
                                                         style=\"width: ";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["totalmoney"]) || array_key_exists("totalmoney", $context) ? $context["totalmoney"] : (function () { throw new RuntimeError('Variable "totalmoney" does not exist.', 86, $this->source); })()), "percent", [], "any", false, false, false, 86), "html", null, true);
        echo "%\" aria-valuenow=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["totalmoney"]) || array_key_exists("totalmoney", $context) ? $context["totalmoney"] : (function () { throw new RuntimeError('Variable "totalmoney" does not exist.', 86, $this->source); })()), "now", [], "any", false, false, false, 86), "html", null, true);
        echo "\" aria-valuemin=\"0\"
                                                         aria-valuemax=\"";
        // line 87
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["totalmoney"]) || array_key_exists("totalmoney", $context) ? $context["totalmoney"] : (function () { throw new RuntimeError('Variable "totalmoney" does not exist.', 87, $this->source); })()), "to", [], "any", false, false, false, 87), "html", null, true);
        echo "\"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-money-bill fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->

                <div class=\"row\">
                    <!-- Content Column -->

                    <div class=\"col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">";
        // line 109
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("New Users", [], "messages");
        echo "</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div id=\"table_users\"></div>
                                <script>

                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Last Cash Actions</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div id=\"table_cash\"></div>
                                <script>


                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class=\"row\">
                    <!-- Area Chart -->
                    <div class=\"col-xl-12 col-lg-12\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Advanced Search</h6>
                            </div>

                            <div class=\"card-body\">
                                <div class=\"col-lg-4 d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" id=\"date_init\" class=\"form-control\" value=\"";
        // line 151
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["defaultdates"]) || array_key_exists("defaultdates", $context) ? $context["defaultdates"] : (function () { throw new RuntimeError('Variable "defaultdates" does not exist.', 151, $this->source); })()), "init", [], "any", false, false, false, 151), "html", null, true);
        echo "\">
                                    </div>
                                </div>
                                <div class=\"col-lg-4   d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" id=\"date_end\" class=\"form-control\" value=\"";
        // line 156
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["defaultdates"]) || array_key_exists("defaultdates", $context) ? $context["defaultdates"] : (function () { throw new RuntimeError('Variable "defaultdates" does not exist.', 156, $this->source); })()), "end", [], "any", false, false, false, 156), "html", null, true);
        echo "\">
                                    </div>
                                </div>
                                <div class=\"col-lg-3  d-inline-block float-right\">
                                    <div class=\"input-group \">
                                        <button class=\"btn btn-info col-md-12\">Filtering</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class=\"col-xl-12 col-lg-12\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Earnings Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"comisionesChart\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xl-6 col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">PremiumPay €</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"ppay_eur\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xl-6 col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">PremiumPay COP</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"ppay_cop\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-primary text-white shadow\">
                            <div class=\"card-body\">
                                Primary
                                <div class=\"text-white-50 small\">#4e73df</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-success text-white shadow\">
                            <div class=\"card-body\">
                                Success
                                <div class=\"text-white-50 small\">#1cc88a</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-info text-white shadow\">
                            <div class=\"card-body\">
                                Info
                                <div class=\"text-white-50 small\">#36b9cc</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-warning text-white shadow\">
                            <div class=\"card-body\">
                                Warning
                                <div class=\"text-white-50 small\">#f6c23e</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-danger text-white shadow\">
                            <div class=\"card-body\">
                                Danger
                                <div class=\"text-white-50 small\">#e74a3b</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-secondary text-white shadow\">
                            <div class=\"card-body\">
                                Secondary
                                <div class=\"text-white-50 small\">#858796</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-light text-black shadow\">
                            <div class=\"card-body\">
                                Light
                                <div class=\"text-black-50 small\">#f8f9fc</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-dark text-white shadow\">
                            <div class=\"card-body\">
                                Dark
                                <div class=\"text-white-50 small\">#5a5c69</div>
                            </div>
                        </div>
                    </div>
                </div-->

                <!--div class=\"row\">


                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card-header py-3\">
                            <h6 class=\"m-0 font-weight-bold text-primary\">Your preferred navigation</h6>
                        </div>
                        <div class=\"card-body\">
                            <ul class=\"nav\">
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-file\"></i>
                                        <span>Terms & Conditions</span></a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-users\"></i>
                                        <span>Users</span></a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-globe\"></i>
                                        <span>Countries</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class=\"col-lg-6 shadow mb-4\" >
                        <div class=\"card-header py-3\">
                            <h6 class=\"m-0 font-weight-bold text-primary\">Development Approach</h6>
                        </div>
                        <div class=\"card-body\">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class=\"mb-0\">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div >
            </div-->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
";
        // line 333
        $this->loadTemplate("footer.html.twig", "home/index.html.twig", 333)->display($context);
        // line 334
        echo "</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class=\"scroll-to-top rounded\" href=\"#page-top\">
    <i class=\"fas fa-angle-up\"></i>
</a>

</body>
    <script>
        var users_str =  '";
        // line 347
        echo (isset($context["lastusers"]) || array_key_exists("lastusers", $context) ? $context["lastusers"] : (function () { throw new RuntimeError('Variable "lastusers" does not exist.', 347, $this->source); })());
        echo "';
        var responsables_json = JSON.parse('";
        // line 348
        echo (isset($context["responsables"]) || array_key_exists("responsables", $context) ? $context["responsables"] : (function () { throw new RuntimeError('Variable "responsables" does not exist.', 348, $this->source); })());
        echo "');
        var data_str =  '";
        // line 349
        echo (isset($context["lastcashactions"]) || array_key_exists("lastcashactions", $context) ? $context["lastcashactions"] : (function () { throw new RuntimeError('Variable "lastcashactions" does not exist.', 349, $this->source); })());
        echo "';
        var comisiones_chart = JSON.parse('";
        // line 350
        echo (isset($context["comisionesgraph"]) || array_key_exists("comisionesgraph", $context) ? $context["comisionesgraph"] : (function () { throw new RuntimeError('Variable "comisionesgraph" does not exist.', 350, $this->source); })());
        echo "');
        var eur_chart = JSON.parse('";
        // line 351
        echo (isset($context["eurppaygraph"]) || array_key_exists("eurppaygraph", $context) ? $context["eurppaygraph"] : (function () { throw new RuntimeError('Variable "eurppaygraph" does not exist.', 351, $this->source); })());
        echo "');
        var cop_chart = JSON.parse('";
        // line 352
        echo (isset($context["copppaygraph"]) || array_key_exists("copppaygraph", $context) ? $context["copppaygraph"] : (function () { throw new RuntimeError('Variable "copppaygraph" does not exist.', 352, $this->source); })());
        echo "');
    </script>

    <script src=\"js/home.js\" type=\"application/javascript\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  495 => 352,  491 => 351,  487 => 350,  483 => 349,  479 => 348,  475 => 347,  460 => 334,  458 => 333,  278 => 156,  270 => 151,  225 => 109,  200 => 87,  194 => 86,  186 => 81,  181 => 78,  179 => 77,  159 => 60,  156 => 59,  154 => 58,  134 => 41,  131 => 40,  129 => 39,  111 => 23,  109 => 22,  98 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{title}}{% endblock %}

{% block body %}
<body id=\"page-top\">

<!-- Page Wrapper -->
<div id=\"wrapper\">

    <!-- Sidebar -->
    {% include 'navegacion.html.twig' %}
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id=\"content-wrapper\" class=\"d-flex flex-column\">

        <!-- Main Content -->
        <div id=\"content\">

            <!-- header -->
            {% include 'header.html.twig' %}
            <!-- End of header -->


            <!-- Begin Page Content -->
            <div class=\"container-fluid\">

                <!-- Content Row -->
                <div class=\"row\">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-primary shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                                            {%trans%}Players{%endtrans%}
                                        </div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{totalplayers}}</div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-users fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-success shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-success text-uppercase mb-1\">
                                            {%trans%}Active Campaigns{%endtrans%}
                                        </div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">{{ countercampaigns }}</div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-ad fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-info shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">
                                            {%trans%}Commisions generated{%endtrans%}
                                        </div>
                                        <div class=\"row no-gutters align-items-center\">
                                            <div class=\"col-auto\">
                                                <div class=\"h5 mb-0 mr-3 font-weight-bold text-gray-800\">{{totalmoney.now}}</div>
                                            </div>
                                            <div class=\"col\">
                                                <div class=\"progress progress-sm mr-2\">
                                                    <div class=\"progress-bar bg-info\" role=\"progressbar\"
                                                         style=\"width: {{totalmoney.percent}}%\" aria-valuenow=\"{{totalmoney.now}}\" aria-valuemin=\"0\"
                                                         aria-valuemax=\"{{totalmoney.to}}\"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=\"col-auto\">
                                        <i class=\"fas fa-money-bill fa-2x text-gray-300\"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->

                <div class=\"row\">
                    <!-- Content Column -->

                    <div class=\"col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">{% trans %}New Users{% endtrans %}</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div id=\"table_users\"></div>
                                <script>

                                </script>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Last Cash Actions</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div id=\"table_cash\"></div>
                                <script>


                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class=\"row\">
                    <!-- Area Chart -->
                    <div class=\"col-xl-12 col-lg-12\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Advanced Search</h6>
                            </div>

                            <div class=\"card-body\">
                                <div class=\"col-lg-4 d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" id=\"date_init\" class=\"form-control\" value=\"{{defaultdates.init}}\">
                                    </div>
                                </div>
                                <div class=\"col-lg-4   d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" id=\"date_end\" class=\"form-control\" value=\"{{defaultdates.end}}\">
                                    </div>
                                </div>
                                <div class=\"col-lg-3  d-inline-block float-right\">
                                    <div class=\"input-group \">
                                        <button class=\"btn btn-info col-md-12\">Filtering</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class=\"col-xl-12 col-lg-12\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Earnings Overview</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"comisionesChart\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xl-6 col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">PremiumPay €</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"ppay_eur\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-xl-6 col-lg-6\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div
                                    class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">PremiumPay COP</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"ppay_cop\"></canvas>
                                    <i class=\"fa fa-spinner fa-spin\"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-primary text-white shadow\">
                            <div class=\"card-body\">
                                Primary
                                <div class=\"text-white-50 small\">#4e73df</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-success text-white shadow\">
                            <div class=\"card-body\">
                                Success
                                <div class=\"text-white-50 small\">#1cc88a</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-info text-white shadow\">
                            <div class=\"card-body\">
                                Info
                                <div class=\"text-white-50 small\">#36b9cc</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-warning text-white shadow\">
                            <div class=\"card-body\">
                                Warning
                                <div class=\"text-white-50 small\">#f6c23e</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-danger text-white shadow\">
                            <div class=\"card-body\">
                                Danger
                                <div class=\"text-white-50 small\">#e74a3b</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-secondary text-white shadow\">
                            <div class=\"card-body\">
                                Secondary
                                <div class=\"text-white-50 small\">#858796</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-light text-black shadow\">
                            <div class=\"card-body\">
                                Light
                                <div class=\"text-black-50 small\">#f8f9fc</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card bg-dark text-white shadow\">
                            <div class=\"card-body\">
                                Dark
                                <div class=\"text-white-50 small\">#5a5c69</div>
                            </div>
                        </div>
                    </div>
                </div-->

                <!--div class=\"row\">


                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"card-header py-3\">
                            <h6 class=\"m-0 font-weight-bold text-primary\">Your preferred navigation</h6>
                        </div>
                        <div class=\"card-body\">
                            <ul class=\"nav\">
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-file\"></i>
                                        <span>Terms & Conditions</span></a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-users\"></i>
                                        <span>Users</span></a>
                                </li>
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" href=\"charts.html\">
                                        <i class=\"fas fa-fw fa-globe\"></i>
                                        <span>Countries</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class=\"col-lg-6 shadow mb-4\" >
                        <div class=\"card-header py-3\">
                            <h6 class=\"m-0 font-weight-bold text-primary\">Development Approach</h6>
                        </div>
                        <div class=\"card-body\">
                            <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                CSS bloat and poor page performance. Custom CSS classes are used to create
                                custom components and custom utility classes.</p>
                            <p class=\"mb-0\">Before working with this theme, you should become familiar with the
                                Bootstrap framework, especially the utility classes.</p>
                        </div>
                    </div>

                </div >
            </div-->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
{% include 'footer.html.twig' %}
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class=\"scroll-to-top rounded\" href=\"#page-top\">
    <i class=\"fas fa-angle-up\"></i>
</a>

</body>
    <script>
        var users_str =  '{{ lastusers | raw }}';
        var responsables_json = JSON.parse('{{ responsables | raw }}');
        var data_str =  '{{ lastcashactions | raw }}';
        var comisiones_chart = JSON.parse('{{ comisionesgraph | raw }}');
        var eur_chart = JSON.parse('{{ eurppaygraph | raw }}');
        var cop_chart = JSON.parse('{{ copppaygraph | raw }}');
    </script>

    <script src=\"js/home.js\" type=\"application/javascript\"></script>
{% endblock %}
", "home/index.html.twig", "/home/Betandeal/PhpstormProjects/newback/templates/home/index.html.twig");
    }
}
