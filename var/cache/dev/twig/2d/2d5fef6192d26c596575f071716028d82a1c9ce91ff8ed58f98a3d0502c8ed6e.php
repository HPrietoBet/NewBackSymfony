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

/* navegacion.html.twig */
class __TwigTemplate_d3e86539a4f8b361befaaf6fcdb048b6e01a773bd9e587827c2f4f9798be38f5 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navegacion.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "navegacion.html.twig"));

        // line 1
        echo "<ul class=\"navbar-nav bg-gradient-primary sidebar sidebar-dark accordion\" id=\"accordionSidebar\">

    <!-- Sidebar - Brand -->
    <a class=\"sidebar-brand d-flex align-items-center justify-content-center\" href=\"/home\">
        <div class=\"sidebar-brand-icon rotate-n-15\">
            <i class=\"fas fa-laugh-wink\"></i>
        </div>
        <div class=\"sidebar-brand-text mx-1\">BetanDeal CMS.<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class=\"sidebar-divider my-0\">

    <!-- Nav Item - Dashboard -->
    <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/home\">
            <i class=\"fas fa-fw fa-tachometer-alt\"></i>
            <span>";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Dashboard", [], "messages");
        echo "</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseTwo\"
           aria-expanded=\"true\" aria-controls=\"collapseTwo\">
            <i class=\"fas fa-fw fa-users\"></i>
            <span>Users</span>
        </a>

        <div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordionSidebar\">
            <div class=\"bg-white py-2 collapse-inner rounded\">
                <h6 class=\"collapse-header\">Users Types:</h6>
                <a class=\"collapse-item\" href=\"/users/admin\">Admin</a>
                <a class=\"collapse-item\" href=\"/users/list\">Users</a>
                <a class=\"collapse-item\" href=\"/users/bookies\">Bookies</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/users/terms-and-conditions\">
            <i class=\"fas fa-fw fa-file\"></i>
            <span>Terms & Conditions</span></a>
    </li>
    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Clients
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients\">
            <i class=\"fas fa-fw fa-business-time\"></i>
            <span>Clients</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients/editor\">
            <i class=\"fas fa-fw fa-code\"></i>
            <span>Clients Editor</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/categories\">
            <i class=\"fas fa-fw fa-list-alt\"></i>
            <span>Categories</span></a>
    </li>


    <!-- Divider -->
    <hr class=\"sidebar-divider\">
    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Campaigns
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/list\">
            <i class=\"fas fa-fw fa-ad\"></i>
            <span>Campaigns List</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/list-active\">
            <i class=\"fas fa-fw fa-user-cog\"></i>
            <span>Active Campaigns</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/marketing\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Marketing Campaigns</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Stats
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats\">
            <i class=\"fas fa-fw fa-chart-area\"></i>
            <span>Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/api\">
            <i class=\"fas fa-fw fa-chart-line\"></i>
            <span>Api Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/syncronize\">
            <i class=\"fas fa-fw fa-cogs\"></i>
            <span>Stats Sync</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/comparer\">
            <i class=\"fas fa-fw fa-chart-bar\"></i>
            <span>Compare Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/competency\">
            <i class=\"fas fa-fw fa-buysellads\"></i>
            <span>Competency</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Money
    </div>

    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/invoicing-and-cash\">
            <i class=\"fas fa-fw fa-cash-register\"></i>
            <span>Invoicing & Cash</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/accounting\">
            <i class=\"fas fa-fw fa-euro-sign\"></i>
            <span>General Accounting</span></a>

    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Others
    </div>

    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/site-creator\">
            <i class=\"fas fa-fw fa-internet-explorer\"></i>
            <span>SiteCreator</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/news\">
            <i class=\"fas fa-fw fa-newspaper\"></i>
            <span>News</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/faqs\">
            <i class=\"fas fa-fw fa-question-circle\"></i>
            <span>FAQ's</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/languages\">
            <i class=\"fas fa-fw fa-language\"></i>
            <span>Languages</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/countries\">
            <i class=\"fas fa-fw fa-globe\"></i>
            <span>Countries</span></a>
    </li>
    <!-- Divider -->

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        PremiumPay
    </div>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/users/premiumpay\">
            <i class=\"fas fa-fw fa-ad\"></i>
            <span>Users</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/getaways/list\">
            <i class=\"fas fa-fw fa-user-cog\"></i>
            <span>Getaways</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/payments/list\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Payments</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/accounting\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Accounting</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/payments/actions\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Actions</span></a>
    </li>
  <!-- Sidebar Message -->
</ul>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "navegacion.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 18,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul class=\"navbar-nav bg-gradient-primary sidebar sidebar-dark accordion\" id=\"accordionSidebar\">

    <!-- Sidebar - Brand -->
    <a class=\"sidebar-brand d-flex align-items-center justify-content-center\" href=\"/home\">
        <div class=\"sidebar-brand-icon rotate-n-15\">
            <i class=\"fas fa-laugh-wink\"></i>
        </div>
        <div class=\"sidebar-brand-text mx-1\">BetanDeal CMS.<sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class=\"sidebar-divider my-0\">

    <!-- Nav Item - Dashboard -->
    <li class=\"nav-item active\">
        <a class=\"nav-link\" href=\"/home\">
            <i class=\"fas fa-fw fa-tachometer-alt\"></i>
            <span>{% trans %}Dashboard{% endtrans %}</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Users
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link collapsed\" href=\"#\" data-toggle=\"collapse\" data-target=\"#collapseTwo\"
           aria-expanded=\"true\" aria-controls=\"collapseTwo\">
            <i class=\"fas fa-fw fa-users\"></i>
            <span>Users</span>
        </a>

        <div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#accordionSidebar\">
            <div class=\"bg-white py-2 collapse-inner rounded\">
                <h6 class=\"collapse-header\">Users Types:</h6>
                <a class=\"collapse-item\" href=\"/users/admin\">Admin</a>
                <a class=\"collapse-item\" href=\"/users/list\">Users</a>
                <a class=\"collapse-item\" href=\"/users/bookies\">Bookies</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/users/terms-and-conditions\">
            <i class=\"fas fa-fw fa-file\"></i>
            <span>Terms & Conditions</span></a>
    </li>
    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Clients
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients\">
            <i class=\"fas fa-fw fa-business-time\"></i>
            <span>Clients</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/clients/editor\">
            <i class=\"fas fa-fw fa-code\"></i>
            <span>Clients Editor</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/categories\">
            <i class=\"fas fa-fw fa-list-alt\"></i>
            <span>Categories</span></a>
    </li>


    <!-- Divider -->
    <hr class=\"sidebar-divider\">
    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Campaigns
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/list\">
            <i class=\"fas fa-fw fa-ad\"></i>
            <span>Campaigns List</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/list-active\">
            <i class=\"fas fa-fw fa-user-cog\"></i>
            <span>Active Campaigns</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/campaigns/marketing\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Marketing Campaigns</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Stats
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats\">
            <i class=\"fas fa-fw fa-chart-area\"></i>
            <span>Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/api\">
            <i class=\"fas fa-fw fa-chart-line\"></i>
            <span>Api Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/syncronize\">
            <i class=\"fas fa-fw fa-cogs\"></i>
            <span>Stats Sync</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/stats/comparer\">
            <i class=\"fas fa-fw fa-chart-bar\"></i>
            <span>Compare Stats</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/competency\">
            <i class=\"fas fa-fw fa-buysellads\"></i>
            <span>Competency</span></a>
    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Money
    </div>

    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/invoicing-and-cash\">
            <i class=\"fas fa-fw fa-cash-register\"></i>
            <span>Invoicing & Cash</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/accounting\">
            <i class=\"fas fa-fw fa-euro-sign\"></i>
            <span>General Accounting</span></a>

    </li>

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        Others
    </div>

    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/site-creator\">
            <i class=\"fas fa-fw fa-internet-explorer\"></i>
            <span>SiteCreator</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/news\">
            <i class=\"fas fa-fw fa-newspaper\"></i>
            <span>News</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/faqs\">
            <i class=\"fas fa-fw fa-question-circle\"></i>
            <span>FAQ's</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/languages\">
            <i class=\"fas fa-fw fa-language\"></i>
            <span>Languages</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/countries\">
            <i class=\"fas fa-fw fa-globe\"></i>
            <span>Countries</span></a>
    </li>
    <!-- Divider -->

    <!-- Divider -->
    <hr class=\"sidebar-divider\">

    <!-- Heading -->
    <div class=\"sidebar-heading\">
        PremiumPay
    </div>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/users/premiumpay\">
            <i class=\"fas fa-fw fa-ad\"></i>
            <span>Users</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/getaways/list\">
            <i class=\"fas fa-fw fa-user-cog\"></i>
            <span>Getaways</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/payments/list\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Payments</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/accounting\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Accounting</span></a>
    </li>
    <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/payments/actions\">
            <i class=\"fas fa-fw fa-adversal\"></i>
            <span>Actions</span></a>
    </li>
  <!-- Sidebar Message -->
</ul>", "navegacion.html.twig", "/home/Betandeal/PhpstormProjects/newback/templates/navegacion.html.twig");
    }
}
