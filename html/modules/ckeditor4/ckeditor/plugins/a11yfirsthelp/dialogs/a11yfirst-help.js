﻿CKEDITOR.dialog.add("a11yFirstHelpDialog",function(k){function n(a){for(var c,b,e,d=0;d<g.length;d++)e=g[d],c="content"+e,b="button"+e,c=document.getElementById(c),b=m.getContentElement("a11yFirstHelpTab",b),c&&b&&(b=b.getElement(),b.addClass("a11yfirsthelp"),b.getParent().addClass("a11yfirsthelp"),e==a?(c.style.display="block",b.addClass("selected")):(c.style.display="none",b.removeClass("selected")));m.getContentElement("a11yFirstHelpTab","helpContentContainer").focus()}var f=k.lang.a11yfirsthelp,
h=k.config,m;showdown.extension("basePath",{type:"lang",regex:/basePath\//g,replace:"string"===typeof CKEDITOR.drupalA11yFirstPath?CKEDITOR.drupalA11yFirstPath:CKEDITOR.basePath});for(var d=Object.keys(h.a11yFirstHelpTopics),g=[],p=[],a=0;a<d.length;a++){var l=d[a];g.push(h.a11yFirstHelpTopics[l].option)}for(a=0;a<d.length;a++)l=d[a],h=g[a],p.push({type:"button",id:"button"+h,style:a==d.length-2?"margin-top: 1.5em":void 0,label:f[l].label,title:f[l].title,option:h,onClick:function(){n(this.option)}});
return{title:f.a11yFirstHelpLabel,minWidth:600,minHeight:360,onLoad:function(){this.getElement().addClass("a11yfirsthelp_dialog")},onShow:function(a){var c;m=this;for(var b=new showdown.Converter({extensions:["basePath"]}),e=0;e<d.length;e++)a=d[e],c="content"+g[e],c=document.getElementById(c),c.innerHTML=b.makeHtml(f[a].content).replace(/%version/g,"1.2.3");k.a11yfirst.helpOption&&n(k.a11yfirst.helpOption)},contents:[{id:"a11yFirstHelpTab",label:f.a11yFirstHelpLabel,title:f.a11yFirstHelpTitle,expand:!0,
padding:0,elements:[{type:"hbox",widths:["35%","65%"],children:[{type:"vbox",align:"left",children:p},{type:"html",id:"helpContentContainer",focus:function(){this.getElement().focus()},html:'\x3cdiv tabindex\x3d"-1" class\x3d"a11yfirsthelpcontent"\x3e\x3cdiv id\x3d"contentHeadingHelp"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentListHelp"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentImageHelp"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentInlineStyleHelp"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentLinkHelp"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentGettingStarted"\x3e\x3c/div\x3e\x3cdiv id\x3d"contentAboutA11yFirst"\x3e\x3c/div\x3e\x3c/div\x3e'}]}]}],
buttons:[CKEDITOR.dialog.okButton]}});