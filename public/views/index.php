<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="/">

	<title>ITFox</title>

	<!-- CSS -->
	<link rel="stylesheet" href="css/style.css"> <!-- custom styles -->
    <link rel="stylesheet" href="libs/ripple/jquery.materialripple.css">
	<link rel="stylesheet" href="fonts/roboto/stylesheet.css"> <!-- fonts -->
	<link rel="stylesheet" href="fonts/roboto-slab/stylesheet.css"> <!-- fonts -->
	<link rel="stylesheet" href="fonts/icons/stroke.css"> <!-- fonts -->
	<link rel="stylesheet" href="fonts/categories/css/categories.css"> <!-- fonts -->
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.css"> <!-- fonts -->
</head>
<body ng-app="ITFox" ng-controller="MainController" ng-cloak>

<div class="allwrapper landing" ng-if="!auth()" ng-cloak>
    <header>
        <a class="logo">ITFox</a>
    </header>
    <div class="landing-content" ng-view></div>

    <footer>
        <a href="/">ITFox</a> 2016 <br />
        Всички права запазени  <br />
        Християн Япраков • Николай Колибаров • Даниел Лидиянов<br />
        <a href="http://www.weband.bg" target="_blank">www.weband.bg</a>
    </footer>
</div>

<div class="allwrapper" ng-if="auth()"  ng-cloak>
	<div class="side-bar">
      <div class="side-bar-trigger"><div class="flaticon stroke W12 trig-icon"></div></div>
      <div class="side-bar-content">
          <!--      HEADER     -->
          <header>
              <a href="/" class="logo">ITFox</a>
          </header>

          <!--       MENU       -->
          <nav>
              <ul class="navigation-holder">
                  <li class="nav-groups">
                      <ul class="side-nav">
                          <li class="side-nav-items"><a href="/" class="side-nav-link" ng-class="{active:pageActive('home')}" ng-click="setPageActive('home')">Начало</a></li>
                          <li class="side-nav-items"><a href="/lessons" class="side-nav-link" ng-class="{active:pageActive('lessons')}" ng-click="setPageActive('lessons')">Уроци</a></li>
                          <li class="side-nav-items"><a href="/exercises" class="side-nav-link" ng-class="{active:pageActive('exercises')}" ng-click="setPageActive('exercises')">Задачи</a></li>
                      </ul>
                  </li>
                  <!--
                      <li class="nav-border"></li>
                      <li class="nav-groups">
                          <ul class="side-nav">
                              <li class="side-nav-items with-btns clearfix"><a href="#" class="btn"><span class="flaticon stroke upload-2"></span> качи урок</a></li>
                              <li class="side-nav-items"><a href="#" class="side-nav-link">Качени уроци</a></li>
                              <li class="side-nav-items with-btns clearfix"><a href="#" class="btn"><span class="flaticon stroke upload-2"></span> качи задача</a></li>
                              <li class="side-nav-items"><a href="#" class="side-nav-link">Качени задачи</a></li>
                              <li class="side-nav-items with-btns clearfix"><a href="#" class="btn"><span class="flaticon stroke upload-2"></span> създай проект</a></li>
                              <li class="side-nav-items"><a href="#" class="side-nav-link">Всички проекти</a></li>
                          </ul>
                      </li>
                  -->
                  <li class="nav-border"></li>
                  <li class="nav-groups">
                      <ul class="side-nav">
                          <li class="side-nav-items"><a href="/files" class="side-nav-link" ng-class="{active:pageActive('files')}" ng-click="setPageActive('files')">Файлове</a></li>
                          <li class="side-nav-items"><a href="/groups" class="side-nav-link" ng-class="{active:pageActive('groups')}" ng-click="setPageActive('groups')">Групи</a></li>
                          <li class="side-nav-items"><a href="/projects" class="side-nav-link" ng-class="{active:pageActive('projects')}" ng-click="setPageActive('projects')">Проекти</a></li>
                      </ul>
                  </li>
                  <li class="nav-border"></li>
                  <li class="nav-groups">
                      <ul class="side-nav">
                          <li class="side-nav-items"><a href="/about" class="side-nav-link" ng-class="{active:pageActive('about')}" ng-click="setPageActive('about')">Относно</a></li>
                          <li class="side-nav-items"><a href="/contacts" class="side-nav-link" ng-class="{active:pageActive('contacts')}" ng-click="setPageActive('contacts')">Контакти</a></li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <footer>
            <a href="/">ITFox</a> 2016 <br />
            Всички права запазени  <br />
            Япраков • Колибаров • Лидиянов<br />
            <a href="http://www.weband.bg" target="_blank">www.weband.bg</a>
        </footer>

      </div>
  </div>
<div class="top-section">
    <!--       USER SECTION       -->
    <div class="user-section signed clearfix">
            <div class="notification-trigger fleft"></div>
            <div class="user-info fleft">
                <div class="avatar-holder fleft">
                    <img src="" class="avatar" alt="">
                </div>
                <div class="user-name fleft">
                    {{user.name}} <span class="flaticon stroke down-1"></span>
                </div>
            </div>
            <a ng-click="logout()" class="nostyle">
                <div class="flaticon stroke logout fright"></div>
            </a>

                    <!--      USER PANEL     -->
            <div class="user-panel inactive">
                <section class="profile clearfix">
                    <h4>Профилни Данни</h4>
                    <div class="avatar-holder big fleft">
                        <img src="" class="avatar" alt="">
                    </div>
                    <div class="fleft">
                            <p>
                                Имате незавършен профил. <br>
                                <a href="edit-user">Попълнете профила си.</a> <br>
                                e-mail: <a href="#">{{ user.email }}</a> <br><br>
                                <!-- учител по ИТ: <a href="#">Спаска Ангелова</a> -->
                            </p>
                        <a href="edit-user" class="btn">Промени</a>
                    </div>
                </section>
                <section class="profile-info-files clearfix">
                    <h4>Файлове</h4>
                    <ul class="files-listing">
                        <li class="clearfix">
                            <a href="#" class="clearfix">
                                <div class="file-name"><i class="fa fa-file-text-o access-color"></i> name.accdb</div>
                                <div class="file-size">1MB</div>
                                <div class="file-date">08.08.2016</div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="#" class="clearfix">
                                <div class="file-name"><i class="fa fa-file-code-o html-color"></i> name.html</div>
                                <div class="file-size">100KB</div>
                                <div class="file-date">08.08.2016</div>
                            </a>
                        </li>
                        <li class="clearfix">
                            <a href="#" class="clearfix">
                                <div class="file-name"><i class="fa fa-file-image-o ps-color"></i> name.jpeg</div>
                                <div class="file-size">15MB</div>
                                <div class="file-date">08.02.2016</div>
                            </a>
                        </li>
                    </ul>
                    <div class="btn-group">
                        <a href="#" class="btn">Качи нов файл</a>
                        <a href="#" class="btn-company">Всички качени (23)</a>
                    </div>
                </section>
                <section class="groups">
                    <h4>Групи и Потребители</h4>
                    <table style="width: 100%;">
                        <tr>
                            <td><a href="#">XI A</a></td>
                            <td><a href="#" class="nostyle">Николай</a> и 14 други</td>
                            <td><span class="legend">КЛАС</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">XI ПМГ</a></td>
                            <td><a href="#" class="nostyle">Виктор</a> и 14 други</td>
                            <td><span class="legend">ВИПУСК</span></td>
                        </tr>
                        <tr>
                            <td><a href="#">ПМГ</a></td>
                            <td>197 ученици</td>
                            <td><span class="legend">УЧИЛИЩЕ</span></td>
                        </tr>
                    </table>
                    <a href="#" class="btn-company db tac air-15-0">Виж всички твои групи</a>
                </section>
            </div>

	    </div>

	    <!--       SEARCH BAR       -->
	    <div class="search-bar">
	        <input class="search-input" type="text" placeholder="Търси теми в сайта...">
	    </div>

	    <!--       CATEGORIES       -->
	    <ul class="categories clearfix">
	        <li class="word"><a href="#" title="MS Word"><span class="catg-icon icon-word"></span><span class="catg-title">MS Word</span></a>
	        </li>
	        <li class="powerpoint"><a href="#" title="MS Powerpoint"><span class="catg-icon icon-powerpoint"></span><span
	                        class="catg-title catg-title-powerpoint"><span class="adobe">MS </span>Powerpoint</span></a>
	        </li>
	        <li class="excel"><a href="#" title="MS Excel"><span class="catg-icon icon-excel"></span><span
	                        class="catg-title">MS Excel</span></a></li>
	        <li class="access"><a href="#" title="MS Access"><span class="catg-icon icon-access"></span><span
	                        class="catg-title">MS Access</span></a></li>
	        <li class="coreldraw"><a href="#" title="Coreldraw"><span class="catg-icon icon-coreldraw"></span><span
	                        class="catg-title">Coreldraw</span></a></li>
	        <li class="html"><a href="#" title="HTML"><span class="catg-icon icon-html"></span><span
	                        class="catg-title">HTML</span></a></li>
	        <li class="ps"><a href="#" title="Adobe Photoshop"><span class="catg-icon icon-ps"></span><span
	                        class="catg-title catg-title-ps"><span class="adobe">Adobe </span>Photoshop</span></a></li>
	        <li class="cpp"><a href="#" title="C++"><span class="catg-icon icon-cpp"></span><span
	                        class="catg-title catg-title-cpp">C++</span></a></li>
	        <li class="more"><a href="#" title="More"><span class="catg-icon icon-more"></span><span
	                        class="catg-title catg-title-more">Други<span></a></li>

	    </ul>
	</div>
	
	<!--       CONTENT       -->
	<div class="content" ng-view>
	</div>

	<!--       DIALOGS      -->
	<div class="dialogs-holder">
		<div class="dialog {{dialog.name}}">
			<div class="dialog-header clearfix">
				<a class="flaticon stroke maximize-4" href="/"></a>
				<div class="dialog-title"><span class="gray-bckg">{{dialog.title}}</span></div>
				<div class="flaticon stroke x-1"></div>
			</div>
			<div class="dialog-content clearfix" ng-include="dialog.url"></div>
		</div>
	</div>
</div>


	<!-- ANGULAR JS -->
	<script src="libs/angular/angular.min.js"></script>
	<script src="libs/angular-route/angular-route.min.js"></script>
	<script src="libs/angular-resource/angular-resource.min.js"></script>
	<script src="libs/ngStorage/ngStorage.min.js"></script>
	<script src="libs/angular-jwt/dist/angular-jwt.min.js"></script>
	<script src="libs/angular-wysiwyg/dist/angular-wysiwyg.min.js"></script>
  <script src='libs/textAngular/dist/textAngular-rangy.min.js'></script>
  <script src='libs/textAngular/dist/textAngular-sanitize.min.js'></script>
  <script src='libs/textAngular/dist/textAngular.min.js'></script>
  <script src='libs/textAngular/dist/textAngularSetup.js'></script>

	<!-- ANGULAR CUSTOM -->
	<script src="js/modules/formValidation.js"></script>
	<script src="js/services.js"></script>
	<script src="js/controllers.js"></script>
	<script src="js/appRoutes.js"></script>
	<script src="js/app.js"></script>

	<!-- CUSTOM JS -->
	<script src="libs/jquery/dist/jquery.min.js"></script>
	<script src="libs/jquery-ui/jquery-ui.min.js"></script>
	<script src="libs/ripple/jquery.materialripple.js"></script>
	<script src="libs/crspline/jquery.crspline.js"></script>
	<script src="js/script.js"></script>
</body>
</html>
