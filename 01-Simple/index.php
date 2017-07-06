<?php
// index.php 20150101 - 20170302
// Copyright (C) 2015-2017 Mark Constable <markc@renta.net> (AGPL-3.0)

echo new class
{
    private
    $in = [
        'm'     => 'home',      // Method action
    ],
    $out = [
        'doc'   => 'SPE::01',
        'nav1'  => '',
        'head'  => 'Simple',
        'main'  => '<p>Error: missing page!</p>',
        'foot'  => 'Copyright (C) 2015-2017 Mark Constable (AGPL-3.0)',
    ],
    $nav1 = [
        ['Home', '?m=home'],
	['About Us', '?m=about Us'],
	['Software', '?m=Software'],
	['Academic', '?m=Academic'],
	['Article', '?m=Article'],
	['E-learning', '?m=E-learning'],
	['Events', '?m=Events'],
        ['Contact Us', '?m=contact Us'],
    ];

    public function __construct()
    {
        $this->in['m'] = $_REQUEST['m'] ?? $this->in['m'];
        if (method_exists($this, $this->in['m']))
            $this->out['main'] = $this->{$this->in['m']}();
        foreach ($this->out as $k => $v)
            $this->out[$k] = method_exists($this, $k) ? $this->$k() : $v;
    }

    public function __toString() : string
    {
        return $this->html();
    }

    private function nav1() : string
    {
         return '
      <nav>' . join('', array_map(function ($n) {
            return '
        <a href="' . $n[1] . '">' . $n[0] . '</a>';
        }, $this->nav1)) . '
      </nav>';
    }

    private function head() : string
    {
        return '
    <header>
      <h1>' . $this->out['head'] . '</h1>' . $this->out['nav1'] . '
    </header>';
    }

    private function main() : string
    {
        return '
    <main>' . $this->out['main'] . '
    </main>';
    }

    private function foot() : string
    {
        return '
    <footer>
      <p><em><small>' . $this->out['foot'] . '</small></em></p>
    </footer>';
    }

    private function html() : string
    {
        extract($this->out, EXTR_SKIP);
        return '<!DOCTYPE html>
<html lang="en" dir="ltr" prefix="content: http://purl.org/rss/1.0/modules/content/  dc: http://purl.org/dc/terms/  foaf: http://xmlns.com/foaf/0.1/  og: http://ogp.me/ns#  rdfs: http://www.w3.org/2000/01/rdf-schema#  schema: http://schema.org/  sioc: http://rdfs.org/sioc/ns#  sioct: http://rdfs.org/sioc/types#  skos: http://www.w3.org/2004/02/skos/core#  xsd: http://www.w3.org/2001/XMLSchema# ">
  <head>
    <meta charset="utf-8" />
<meta name="Generator" content="Drupal 8 (https://www.drupal.org)" />
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="/core/misc/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="alternate" type="application/rss+xml" title="" href="http://dev-department-of-library-and-information-science.pantheonsite.io/rss.xml" />

    <title>Home | Department of Library and Information Science</title>
    <style media="all">
@import url("/core/assets/vendor/normalize-css/normalize.css?osegeg");
@import url("/core/themes/stable/css/system/components/ajax-progress.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/align.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/autocomplete-loading.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/fieldgroup.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/container-inline.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/clearfix.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/details.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/hidden.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/item-list.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/js.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/nowrap.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/position-container.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/progress.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/reset-appearance.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/resize.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/sticky-header.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/system-status-counter.css?osegeg");
@import url("/core/themes/stable/css/system/components/system-status-report-counters.css?osegeg");
@import url("/core/themes/stable/css/system/components/system-status-report-general-info.css?osegeg");
@import url("/core/themes/stable/css/system/components/tabledrag.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/tablesort.module.css?osegeg");
@import url("/core/themes/stable/css/system/components/tree-child.module.css?osegeg");
@import url("/core/themes/stable/css/views/views.module.css?osegeg");
@import url("/core/modules/layout_discovery/layouts/onecol/onecol.css?osegeg");
</style>
<style media="all">
@import url("/core/themes/bartik/css/base/elements.css?osegeg");
@import url("/core/themes/bartik/css/layout.css?osegeg");
@import url("/core/themes/classy/css/components/progress.css?osegeg");
@import url("/core/themes/classy/css/components/action-links.css?osegeg");
@import url("/core/themes/classy/css/components/breadcrumb.css?osegeg");
@import url("/core/themes/classy/css/components/button.css?osegeg");
@import url("/core/themes/classy/css/components/collapse-processed.css?osegeg");
@import url("/core/themes/classy/css/components/container-inline.css?osegeg");
@import url("/core/themes/classy/css/components/details.css?osegeg");
@import url("/core/themes/classy/css/components/exposed-filters.css?osegeg");
@import url("/core/themes/classy/css/components/field.css?osegeg");
@import url("/core/themes/classy/css/components/form.css?osegeg");
@import url("/core/themes/classy/css/components/icons.css?osegeg");
@import url("/core/themes/classy/css/components/inline-form.css?osegeg");
@import url("/core/themes/classy/css/components/item-list.css?osegeg");
@import url("/core/themes/classy/css/components/link.css?osegeg");
@import url("/core/themes/classy/css/components/links.css?osegeg");
@import url("/core/themes/classy/css/components/menu.css?osegeg");
@import url("/core/themes/classy/css/components/more-link.css?osegeg");
@import url("/core/themes/classy/css/components/pager.css?osegeg");
@import url("/core/themes/classy/css/components/tabledrag.css?osegeg");
@import url("/core/themes/classy/css/components/tableselect.css?osegeg");
@import url("/core/themes/classy/css/components/tablesort.css?osegeg");
@import url("/core/themes/classy/css/components/tabs.css?osegeg");
@import url("/core/themes/classy/css/components/textarea.css?osegeg");
@import url("/core/themes/classy/css/components/ui-dialog.css?osegeg");
@import url("/core/themes/classy/css/components/node.css?osegeg");
@import url("/core/themes/classy/css/components/messages.css?osegeg");
@import url("/core/themes/bartik/css/components/block.css?osegeg");
@import url("/core/themes/bartik/css/components/book.css?osegeg");
@import url("/core/themes/bartik/css/components/breadcrumb.css?osegeg");
</style>
<style media="all">
@import url("/core/themes/bartik/css/components/captions.css?osegeg");
@import url("/core/themes/bartik/css/components/comments.css?osegeg");
@import url("/core/themes/bartik/css/components/contextual.css?osegeg");
@import url("/core/themes/bartik/css/components/demo-block.css?osegeg");
@import url("/core/themes/bartik/css/components/dropbutton.component.css?osegeg");
@import url("/core/themes/bartik/css/components/featured-top.css?osegeg");
@import url("/core/themes/bartik/css/components/feed-icon.css?osegeg");
@import url("/core/themes/bartik/css/components/field.css?osegeg");
@import url("/core/themes/bartik/css/components/form.css?osegeg");
@import url("/core/themes/bartik/css/components/forum.css?osegeg");
@import url("/core/themes/bartik/css/components/header.css?osegeg");
@import url("/core/themes/bartik/css/components/help.css?osegeg");
@import url("/core/themes/bartik/css/components/highlighted.css?osegeg");
@import url("/core/themes/bartik/css/components/item-list.css?osegeg");
@import url("/core/themes/bartik/css/components/list-group.css?osegeg");
@import url("/core/themes/bartik/css/components/list.css?osegeg");
@import url("/core/themes/bartik/css/components/main-content.css?osegeg");
@import url("/core/themes/bartik/css/components/menu.css?osegeg");
@import url("/core/themes/bartik/css/components/messages.css?osegeg");
@import url("/core/themes/bartik/css/components/node.css?osegeg");
@import url("/core/themes/bartik/css/components/node-preview.css?osegeg");
@import url("/core/themes/bartik/css/components/page-title.css?osegeg");
@import url("/core/themes/bartik/css/components/pager.css?osegeg");
@import url("/core/themes/bartik/css/components/panel.css?osegeg");
@import url("/core/themes/bartik/css/components/primary-menu.css?osegeg");
@import url("/core/themes/bartik/css/components/search-form.css?osegeg");
@import url("/core/themes/bartik/css/components/search-results.css?osegeg");
@import url("/core/themes/bartik/css/components/secondary-menu.css?osegeg");
@import url("/core/themes/bartik/css/components/shortcut.css?osegeg");
@import url("/core/themes/bartik/css/components/skip-link.css?osegeg");
@import url("/core/themes/bartik/css/components/sidebar.css?osegeg");
</style>
<style media="all">
@import url("/core/themes/bartik/css/components/site-branding.css?osegeg");
@import url("/core/themes/bartik/css/components/site-footer.css?osegeg");
@import url("/core/themes/bartik/css/components/table.css?osegeg");
@import url("/core/themes/bartik/css/components/tablesort-indicator.css?osegeg");
@import url("/core/themes/bartik/css/components/tabs.css?osegeg");
@import url("/core/themes/bartik/css/components/text-formatted.css?osegeg");
@import url("/core/themes/bartik/css/components/toolbar.css?osegeg");
@import url("/core/themes/bartik/css/components/featured-bottom.css?osegeg");
@import url("/core/themes/bartik/css/components/password-suggestions.css?osegeg");
@import url("/core/themes/bartik/css/components/ui.widget.css?osegeg");
@import url("/core/themes/bartik/css/components/vertical-tabs.component.css?osegeg");
@import url("/core/themes/bartik/css/components/views.css?osegeg");
@import url("/core/themes/bartik/css/components/buttons.css?osegeg");
@import url("/core/themes/bartik/css/components/image-button.css?osegeg");
@import url("/core/themes/bartik/css/components/ui-dialog.css?osegeg");
@import url("/sites/default/files/color/bartik-4c498f20/colors.css?osegeg");
</style>
<style media="print">
@import url("/core/themes/bartik/css/print.css?osegeg");
</style>

    
<!--[if lte IE 8]>
<script src="/core/assets/vendor/html5shiv/html5shiv.min.js?v=3.7.3"></script>
<![endif]-->

  </head>
  <body class="layout-one-sidebar layout-sidebar-first path-frontpage">
        <a href="#main-content" class="visually-hidden focusable skip-link">
      Skip to main content
    </a>
    
    <div id="page-wrapper">
  <div id="page">
    <header id="header" class="header" role="banner" aria-label="Site header">
      <div class="section layout-container clearfix">
          <div class="region region-secondary-menu">
    <nav role="navigation" aria-labelledby="block-bartik-account-menu-menu" id="block-bartik-account-menu" class="block block-menu navigation menu--account">
            
  <h2 class="visually-hidden" id="block-bartik-account-menu-menu">User account menu</h2>
  

      <div class="content">
        <div class="menu-toggle-target menu-toggle-target-show" id="show-block-bartik-account-menu"></div>
    <div class="menu-toggle-target" id="hide-block-bartik-account-menu"></div>
    <a class="menu-toggle" href="#show-block-bartik-account-menu">Show &mdash; User account menu</a>
    <a class="menu-toggle menu-toggle--hide" href="#hide-block-bartik-account-menu">Hide &mdash; User account menu</a>
    
              <ul class="clearfix menu">
                    <li class="menu-item">
        <a href="/user/login" data-drupal-link-system-path="user/login">Log in</a>
              </li>
        </ul>
  


  </div>
</nav>

  </div>

          <div class="clearfix region region-header">
    <div id="block-bartik-branding" class="clearfix site-branding block block-system block-system-branding-block">
  
    
        <a href="/" title="Home" rel="home" class="site-branding__logo">
      <img src="/sites/default/files/q61t-compressed%20%281%29.jpg" alt="Home" />
    </a>
        <div class="site-branding__text">
              <div class="site-branding__name">
          <a href="/" title="Home" rel="home">Department of Library and Information Science</a>
        </div>
                    <div class="site-branding__slogan">Information Is Liberating</div>
          </div>
  </div>

  </div>

          <div class="region region-primary-menu">
    <nav role="navigation" aria-labelledby="block-bartik-main-menu-menu" id="block-bartik-main-menu" class="block block-menu navigation menu--main">
            
  <h2 class="visually-hidden" id="block-bartik-main-menu-menu">Main navigation</h2>
  

      <div class="content">
        <div class="menu-toggle-target menu-toggle-target-show" id="show-block-bartik-main-menu"></div>
    <div class="menu-toggle-target" id="hide-block-bartik-main-menu"></div>
    <a class="menu-toggle" href="#show-block-bartik-main-menu">Show &mdash; Main navigation</a>
    <a class="menu-toggle menu-toggle--hide" href="#hide-block-bartik-main-menu">Hide &mdash; Main navigation</a>
    
              <ul class="clearfix menu">
                    <li class="menu-item">
        <a href="/" data-drupal-link-system-path="&lt;front&gt;" class="is-active">Home</a>
              </li>
                <li class="menu-item">
        <a href="/node/9" data-drupal-link-system-path="node/9">About Us</a>
              </li>
                <li class="menu-item">
        <a href="/node/10" data-drupal-link-system-path="node/10">Software</a>
              </li>
                <li class="menu-item">
        <a href="/Academic">Academic</a>
              </li>
                <li class="menu-item">
        <a href="/node/13" data-drupal-link-system-path="node/13">Article</a>
              </li>
                <li class="menu-item">
        <a href="/node/12" data-drupal-link-system-path="node/12">E-Learning</a>
              </li>
                <li class="menu-item">
        <a href="/node/11" data-drupal-link-system-path="node/11">Events</a>
              </li>
                <li class="menu-item">
        <a href="/node/16" data-drupal-link-system-path="node/16">Contact Us</a>
              </li>
        </ul>
  


  </div>
</nav>

  </div>

      </div>
    </header>
          <div class="highlighted">
        <aside class="layout-container section clearfix" role="complementary">
            <div class="region region-highlighted">
    
  

  </div>

        </aside>
      </div>
            <div id="main-wrapper" class="layout-main-wrapper layout-container clearfix">
      <div id="main" class="layout-main clearfix">
        
        <main id="content" class="column main-content" role="main">
          <section class="section">
            <a id="main-content" tabindex="-1"></a>
              <div class="region region-content">
    <div id="block-bartik-page-title" class="block block-core block-page-title-block">
  
    
      <div class="content">
      
  <h1 class="title page-title"></h1>


    </div>
  </div>
<div id="block-bartik-content" class="block block-system block-system-main-block">
  
    
      <div class="content">
      <div class="views-element-container"><div class="view view-frontpage view-id-frontpage view-display-id-page_1 js-view-dom-id-ec212216252e5a9a9160aa8558e9078a5c384ce29fe686fee599bbbeda48ee67">
  
    
      
      <div class="view-content">
          <div class="views-row">
    
<article data-history-node-id="25" role="article" about="/node/25" class="node node--type-photo-gallery node--promoted node--view-mode-teaser clearfix">
  <header>
    
          <h2 class="node__title">
        <a href="/node/25" rel="bookmark"><span class="field field--name-title field--type-string field--label-hidden">Seminar &amp; conferences </span>
</a>
      </h2>
        
          <div class="node__meta">
        <article typeof="schema:Person" about="/user/1" class="profile">
    <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
      
    </div>
  </div>
</article>

        <span>
          Submitted by <span class="field field--name-uid field--type-entity-reference field--label-hidden"><span lang="" about="/user/1" typeof="schema:Person" property="schema:name" datatype="">arti26</span></span>
 on <span class="field field--name-created field--type-created field--label-hidden">Sat, 07/01/2017 - 09:57</span>
        </span>
        
      </div>
      </header>
  <div class="node__content clearfix">
      <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
        <div class="node__links">
    <ul class="links inline"><li class="node-readmore"><a href="/node/25" rel="tag" title="Seminar &amp; conferences " hreflang="en">Read more<span class="visually-hidden"> about Seminar &amp; conferences </span></a></li></ul>  </div>

    </div>
  </div>

  </div>
</article>

  </div>
    <div class="views-row">
    
<article data-history-node-id="24" role="article" about="/node/24" class="node node--type-photo-gallery node--promoted node--view-mode-teaser clearfix">
  <header>
    
          <h2 class="node__title">
        <a href="/node/24" rel="bookmark"><span class="field field--name-title field--type-string field--label-hidden">Visit to National Library Kolkata</span>
</a>
      </h2>
        
          <div class="node__meta">
        <article typeof="schema:Person" about="/user/1" class="profile">
    <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
      
    </div>
  </div>
</article>

        <span>
          Submitted by <span class="field field--name-uid field--type-entity-reference field--label-hidden"><span lang="" about="/user/1" typeof="schema:Person" property="schema:name" datatype="">arti26</span></span>
 on <span class="field field--name-created field--type-created field--label-hidden">Sat, 07/01/2017 - 09:52</span>
        </span>
        
      </div>
      </header>
  <div class="node__content clearfix">
      <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
        <div class="node__links">
    <ul class="links inline"><li class="node-readmore"><a href="/node/24" rel="tag" title="Visit to National Library Kolkata" hreflang="en">Read more<span class="visually-hidden"> about Visit to National Library Kolkata</span></a></li></ul>  </div>

    </div>
  </div>

  </div>
</article>

  </div>
    <div class="views-row">
    
<article data-history-node-id="13" role="article" about="/node/13" typeof="schema:Article" class="node node--type-article node--promoted node--view-mode-teaser clearfix">
  <header>
    
          <h2 class="node__title">
        <a href="/node/13" rel="bookmark"><span property="schema:name" class="field field--name-title field--type-string field--label-hidden">Article</span>
</a>
      </h2>
          <span property="schema:name" content="Article" class="rdf-meta hidden"></span>
  <span property="schema:interactionCount" content="UserComments:0" class="rdf-meta hidden"></span>

          <div class="node__meta">
        <article typeof="schema:Person" about="/user/1" class="profile">
    <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
      
    </div>
  </div>
</article>

        <span>
          Submitted by <span rel="schema:author" class="field field--name-uid field--type-entity-reference field--label-hidden"><span lang="" about="/user/1" typeof="schema:Person" property="schema:name" datatype="">arti26</span></span>
 on <span property="schema:dateCreated" content="2017-06-09T10:37:10+00:00" class="field field--name-created field--type-created field--label-hidden">Fri, 06/09/2017 - 10:37</span>
        </span>
          <span property="schema:dateCreated" content="2017-06-09T10:37:10+00:00" class="rdf-meta hidden"></span>

      </div>
      </header>
  <div class="node__content clearfix">
      <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
      
            <div property="schema:text" class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item"><h2><strong>Open Source Software: Role of National and International Organization</strong></h2>

<h2> February 2012; DOI: 10.13140/RG.2.1.2492.8480</h2>

<p>Conference: " Electronic services in Libraries", At Amravati, Volume: vol.1</p>

<p>Abstract :</p></div>
        <div class="node__links">
    <ul class="links inline"><li class="node-readmore"><a href="/node/13" rel="tag" title="Article" hreflang="en">Read more<span class="visually-hidden"> about Article</span></a></li><li class="comment-forbidden"><a href="/user/login?destination=/node/13%23comment-form">Log in</a> or <a href="/user/register?destination=/node/13%23comment-form">register</a> to post comments</li></ul>  </div>

    </div>
  </div>

  </div>
</article>

  </div>

    </div>
  
      
              <div class="feed-icons">
      <a href="http://dev-department-of-library-and-information-science.pantheonsite.io/rss.xml" class="feed-icon">
  Subscribe to 
</a>

    </div>
  </div>
</div>

    </div>
  </div>

  </div>

          </section>
        </main>
                  <div id="sidebar-first" class="column sidebar">
            <aside class="section" role="complementary">
                <div class="region region-sidebar-first">
    <div class="search-block-form block block-search container-inline" data-drupal-selector="search-block-form" id="block-bartik-search" role="search">
  
      <h2>Search</h2>
    
    <div class="content container-inline">
        <form action="/search/node" method="get" id="search-block-form" accept-charset="UTF-8" class="search-form search-block-form">
  <div class="js-form-item form-item js-form-type-search form-type-search js-form-item-keys form-item-keys form-no-label">
      <label for="edit-keys" class="visually-hidden">Search</label>
        <input title="Enter the terms you wish to search for." data-drupal-selector="edit-keys" type="search" id="edit-keys" name="keys" value="" size="15" maxlength="128" class="form-search" />

        </div>
<div data-drupal-selector="edit-actions" class="form-actions js-form-wrapper form-wrapper" id="edit-actions"><input class="search-form__submit button js-form-submit form-submit" data-drupal-selector="edit-submit" type="submit" id="edit-submit" value="Search" />
</div>

</form>

  
  </div>
</div>
<nav role="navigation" aria-labelledby="block-bartik-tools-menu" id="block-bartik-tools" class="block block-menu navigation menu--tools">
      
  <h2 id="block-bartik-tools-menu">Recent Topic</h2>
  

      <div class="content">
        <div class="menu-toggle-target menu-toggle-target-show" id="show-block-bartik-tools"></div>
    <div class="menu-toggle-target" id="hide-block-bartik-tools"></div>
    <a class="menu-toggle" href="#show-block-bartik-tools">Show &mdash; Recent Topic</a>
    <a class="menu-toggle menu-toggle--hide" href="#hide-block-bartik-tools">Hide &mdash; Recent Topic</a>
    
              <ul class="clearfix menu">
                    <li class="menu-item">
        <a href="/forum" data-drupal-link-system-path="forum">Forums</a>
              </li>
        </ul>
  


  </div>
</nav>

  </div>

            </aside>
          </div>
                      </div>
    </div>
        <footer class="site-footer">
      <div class="layout-container">
                  <div class="site-footer__top clearfix">
            
            
            
              <div class="region region-footer-fourth">
    <div id="block-naacaccreditedbyagrade" class="block block-block-content block-block-contentc5878791-65f0-42b6-a503-e745c24d35c2">
  
      <h2>NAAC Accredited by &#039;A&#039; Grade </h2>
    
      <div class="content">
        <div class="layout layout--onecol">
    <div class="layout__region layout__region--content">
      
            <div class="clearfix text-formatted field field--name-body field--type-text-with-summary field--label-hidden field__item"><p>Approved by-</p>

<p><img alt="logo" data-entity-type="file" data-entity-uuid="f5962935-7082-45e3-825e-eb4a75350278" src="/sites/default/files/inline-images/sgbau%20%281%29.png" class="align-left" /> </p>

<p> </p>

<p>Sant Gadge Baba University Amravati</p></div>
      
    </div>
  </div>

    </div>
  </div>

  </div>

          </div>
                          <div class="site-footer__bottom">
              <div class="region region-footer-fifth">
    <div id="block-bartik-powered" role="complementary" class="block block-system block-system-powered-by-block">
  
    
      <div class="content">
      <span>Powered by <a href="https://www.drupal.org">Drupal</a></span>
    </div>
  </div>
<nav role="navigation" aria-labelledby="block-bartik-footer-menu" id="block-bartik-footer" class="block block-menu navigation menu--footer">
            
  <h2 class="visually-hidden" id="block-bartik-footer-menu">Footer menu</h2>
  

      <div class="content">
        <div class="menu-toggle-target menu-toggle-target-show" id="show-block-bartik-footer"></div>
    <div class="menu-toggle-target" id="hide-block-bartik-footer"></div>
    <a class="menu-toggle" href="#show-block-bartik-footer">Show &mdash; Footer menu</a>
    <a class="menu-toggle menu-toggle--hide" href="#hide-block-bartik-footer">Hide &mdash; Footer menu</a>
    
              <ul class="clearfix menu">
                    <li class="menu-item">
        <a href="/contact" data-drupal-link-system-path="contact">Contact</a>
              </li>
                <li class="menu-item">
        <a href="/sgbau.ac%2Cin">Copyright © 2017 - SGB Amravati University. All Rights Reserved.</a>
              </li>
        </ul>
  


  </div>
</nav>

  </div>

          </div>
              </div>
    </footer>
  </div>
</div>

    
    <script type="application/json" data-drupal-selector="drupal-settings-json">{"path":{"baseUrl":"\/","scriptPath":null,"pathPrefix":"","currentPath":"node","currentPathIsAdmin":false,"isFront":true,"currentLanguage":"en"},"pluralDelimiter":"\u0003","ajaxPageState":{"libraries":"bartik\/global-styling,classy\/base,classy\/messages,classy\/node,core\/html5shiv,core\/normalize,layout_discovery\/onecol,ng_lightbox\/ng_lightbox,system\/base,views\/views.module","theme":"bartik","theme_token":null},"ajaxTrustedUrl":{"\/search\/node":true},"user":{"uid":0,"permissionsHash":"caad18d95ce1bde516c24409e9bb404759a6a56618d9816e22def1f17639686f"}}</script>
<script src="/core/assets/vendor/domready/ready.min.js?v=1.0.8"></script>
<script src="/core/assets/vendor/jquery/jquery.min.js?v=2.2.4"></script>
<script src="/core/assets/vendor/jquery-once/jquery.once.min.js?v=2.1.1"></script>
<script src="/core/misc/drupalSettingsLoader.js?v=8.3.3"></script>
<script src="/core/misc/drupal.js?v=8.3.3"></script>
<script src="/core/misc/drupal.init.js?v=8.3.3"></script>
<script src="/core/misc/progress.js?v=8.3.3"></script>
<script src="/core/misc/ajax.js?v=8.3.3"></script>

  </body>
</html>
';
    }

    private function home() { return '<h2>Home Page</h2><p>Lorem ipsum home.</p>'; }
    private function about() { return '<h2>About Page</h2><p>Lorem ipsum about.</p>'; }
    private function contact() { return '<h2>Contact Page</h2><p>Lorem ipsum contact.</p>'; }
};
