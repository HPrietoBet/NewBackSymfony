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

        echo "Hello HomeController!";
        
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

                <!-- Page Heading -->
                <div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
                    <h1 class=\"h3 mb-0 text-gray-800\">Dashboard</h1>
                    <a href=\"#\" class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm\"><i
                                class=\"fas fa-download fa-sm text-white-50\"></i> ";
        // line 33
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Symfony is great", [], "messages");
        // line 34
        echo "                    </a>
                </div>

                <!-- Content Row -->
                <div class=\"row\">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-primary shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                                            Players</div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">\$40,000</div>
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
                                            Active Campaigns</div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">\$215,000</div>
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
                                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 82, $this->source); })()), "html", null, true);
        echo "
                                        </div>
                                        <div class=\"row no-gutters align-items-center\">
                                            <div class=\"col-auto\">
                                                <div class=\"h5 mb-0 mr-3 font-weight-bold text-gray-800\">50%</div>
                                            </div>
                                            <div class=\"col\">
                                                <div class=\"progress progress-sm mr-2\">
                                                    <div class=\"progress-bar bg-info\" role=\"progressbar\"
                                                         style=\"width: 50%\" aria-valuenow=\"50\" aria-valuemin=\"0\"
                                                         aria-valuemax=\"100\"></div>
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
                    <div class=\"col-lg-4 mb-4\">
                        <!-- Project Card Example -->
                        <div class=\"card shadow mb-4\">
                            <div class=\"card-header py-3\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Alerts</h6>
                            </div>
                            <div class=\"card-body\">
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-danger text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>20</b> Active campaigns without codes
                                            <div class=\"text-white-50 small\">We have to create new codes for <a href=\"#\" class=\"text-gray-100\">this campaigns</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-warning text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>85</b> Users asking for campaigns
                                            <div class=\"text-white-50 small\">Pending for check <a href=\"#\" class=\"text-gray-100\">this users</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-success text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>> 15.000.000 €</b> in comisions
                                            <div class=\"text-white-50 small\">We increase to 15.000.000 € in comisions.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-4\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">New Users</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart_1\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-4\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Last Cash Actions</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart_1\"></canvas>
                                </div>
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
                                        <input type=\"date\" class=\"form-control\">
                                    </div>
                                </div>
                                <div class=\"col-lg-4   d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" class=\"form-control\">
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
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
                </div>

                <div class=\"row\">

                    <!-- Illustrations -->
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
                    <!-- Approach -->
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

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
";
        // line 408
        $this->loadTemplate("footer.html.twig", "home/index.html.twig", 408)->display($context);
        // line 409
        echo "</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class=\"scroll-to-top rounded\" href=\"#page-top\">
    <i class=\"fas fa-angle-up\"></i>
</a>

<!-- Logout Modal-->
<div class=\"modal fade\" id=\"logoutModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Ready to Leave?</h5>
                <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
            </div>
            <div class=\"modal-body\">Select \"Logout\" below if you are ready to end your current session.</div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">Cancel</button>
                <a class=\"btn btn-primary\" href=\"login.html\">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
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
        return array (  506 => 409,  504 => 408,  175 => 82,  125 => 34,  123 => 33,  111 => 23,  109 => 22,  98 => 13,  96 => 12,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello HomeController!{% endblock %}

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

                <!-- Page Heading -->
                <div class=\"d-sm-flex align-items-center justify-content-between mb-4\">
                    <h1 class=\"h3 mb-0 text-gray-800\">Dashboard</h1>
                    <a href=\"#\" class=\"d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm\"><i
                                class=\"fas fa-download fa-sm text-white-50\"></i> {% trans %}Symfony is great{% endtrans %}
                    </a>
                </div>

                <!-- Content Row -->
                <div class=\"row\">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class=\"col-xl-4 col-md-6 mb-4\">
                        <div class=\"card border-left-primary shadow h-100 py-2\">
                            <div class=\"card-body\">
                                <div class=\"row no-gutters align-items-center\">
                                    <div class=\"col mr-2\">
                                        <div class=\"text-xs font-weight-bold text-primary text-uppercase mb-1\">
                                            Players</div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">\$40,000</div>
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
                                            Active Campaigns</div>
                                        <div class=\"h5 mb-0 font-weight-bold text-gray-800\">\$215,000</div>
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
                                        <div class=\"text-xs font-weight-bold text-info text-uppercase mb-1\">{{ test }}
                                        </div>
                                        <div class=\"row no-gutters align-items-center\">
                                            <div class=\"col-auto\">
                                                <div class=\"h5 mb-0 mr-3 font-weight-bold text-gray-800\">50%</div>
                                            </div>
                                            <div class=\"col\">
                                                <div class=\"progress progress-sm mr-2\">
                                                    <div class=\"progress-bar bg-info\" role=\"progressbar\"
                                                         style=\"width: 50%\" aria-valuenow=\"50\" aria-valuemin=\"0\"
                                                         aria-valuemax=\"100\"></div>
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
                    <div class=\"col-lg-4 mb-4\">
                        <!-- Project Card Example -->
                        <div class=\"card shadow mb-4\">
                            <div class=\"card-header py-3\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Alerts</h6>
                            </div>
                            <div class=\"card-body\">
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-danger text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>20</b> Active campaigns without codes
                                            <div class=\"text-white-50 small\">We have to create new codes for <a href=\"#\" class=\"text-gray-100\">this campaigns</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-warning text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>85</b> Users asking for campaigns
                                            <div class=\"text-white-50 small\">Pending for check <a href=\"#\" class=\"text-gray-100\">this users</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=\"col-lg-12 mb-4\">
                                    <div class=\"card bg-success text-white shadow\">
                                        <div class=\"card-body\">
                                            <b>> 15.000.000 €</b> in comisions
                                            <div class=\"text-white-50 small\">We increase to 15.000.000 € in comisions.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-4\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">New Users</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart_1\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Area Chart -->
                    <div class=\"col-lg-4\">
                        <div class=\"card shadow mb-4\">
                            <!-- Card Header - Dropdown -->
                            <div class=\"card-header py-3 d-flex flex-row align-items-center justify-content-between\">
                                <h6 class=\"m-0 font-weight-bold text-primary\">Last Cash Actions</h6>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart_1\"></canvas>
                                </div>
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
                                        <input type=\"date\" class=\"form-control\">
                                    </div>
                                </div>
                                <div class=\"col-lg-4   d-inline-block\">
                                    <div class=\"input-group date\" data-provide=\"datepicker\">
                                        <input type=\"date\" class=\"form-control\">
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
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
                                <div class=\"dropdown no-arrow\">
                                    <a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\"
                                       data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fas fa-ellipsis-v fa-sm fa-fw text-gray-400\"></i>
                                    </a>
                                    <div class=\"dropdown-menu dropdown-menu-right shadow animated--fade-in\"
                                         aria-labelledby=\"dropdownMenuLink\">
                                        <div class=\"dropdown-header\">Dropdown Header:</div>
                                        <a class=\"dropdown-item\" href=\"#\">Action</a>
                                        <a class=\"dropdown-item\" href=\"#\">Another action</a>
                                        <div class=\"dropdown-divider\"></div>
                                        <a class=\"dropdown-item\" href=\"#\">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class=\"card-body\">
                                <div class=\"chart-area\">
                                    <canvas id=\"myAreaChart\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-6 mb-4\">
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
                </div>

                <div class=\"row\">

                    <!-- Illustrations -->
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
                    <!-- Approach -->
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

                </div>
            </div>

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

<!-- Logout Modal-->
<div class=\"modal fade\" id=\"logoutModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\"
     aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"exampleModalLabel\">Ready to Leave?</h5>
                <button class=\"close\" type=\"button\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">×</span>
                </button>
            </div>
            <div class=\"modal-body\">Select \"Logout\" below if you are ready to end your current session.</div>
            <div class=\"modal-footer\">
                <button class=\"btn btn-secondary\" type=\"button\" data-dismiss=\"modal\">Cancel</button>
                <a class=\"btn btn-primary\" href=\"login.html\">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
{% endblock %}
", "home/index.html.twig", "/home/Betandeal/PhpstormProjects/newback/templates/home/index.html.twig");
    }
}
