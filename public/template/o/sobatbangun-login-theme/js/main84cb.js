AUI().ready("liferay-hudcrumbs","liferay-navigation-interaction","liferay-sign-in-modal",function(a){var b=a.one("#navigation");b&&b.plug(Liferay.NavigationInteraction);(b=a.one("#breadcrumbs"))&&b.plug(a.Hudcrumbs);(a=a.one("li.sign-in a"))&&"true"!==a.getData("redirect")&&a.plug(Liferay.SignInModal)});
$(window).load(function(){$("input.inputUsername").before("\x3ci class\x3d'fa fa-user' aria-hidden\x3d'true'\x3e\x3c/i\x3e");$("input.inputPassword").before("\x3ci class\x3d'fa fa-lock' aria-hidden\x3d'true'\x3e\x3c/i\x3e");$("input.inputPassword").after("\x3ci class\x3d'fa fa-eye' aria-hidden\x3d'true'\x3e\x3c/i\x3e");$("input.inputPassword").after("\x3ci class\x3d'fa fa-eye-slash' aria-hidden\x3d'true'\x3e\x3c/i\x3e");$(".fa-eye").click(function(){$(this).parents(".input-text-wrapper").addClass("show-pass");
$(this).parents(".input-text-wrapper").removeClass("hide-pass");$(this).parents(".input-text-wrapper").find(".inputPassword").attr("type","text")});$(".fa-eye-slash").click(function(){$(this).parents(".input-text-wrapper").removeClass("show-pass");$(this).parents(".input-text-wrapper").addClass("hide-pass");$(this).parents(".input-text-wrapper").find(".inputPassword").attr("type","password")});$("dl").nextAll("p:first").css("color","#000")});$(document).ready(function(){});