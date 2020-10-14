_menuCloseDelay=500           // The time delay for menus to remain visible on mouse out
_menuOpenDelay=150            // The time delay before menus open on mouse over
_subOffsetTop=10              // Sub menu top offset
_subOffsetLeft=-10            // Sub menu left offset

rootPath = '';


with(submenuStyle=new mm_style()){
offbgcolor="#DEEFFF";
offcolor="#003366";
onbgcolor="#36537D";
oncolor="#FFFFFF";
bordercolor="#296488";
borderstyle="solid";
borderwidth=1;
separatorcolor="#2D729D";
separatorsize="1";
padding=5;
fontsize="xx-small";
fontstyle="normal";
fontfamily="Verdana, Tahoma, Arial";
fontweight="bold";
itemwidth="230";
pagecolor="black";
pagebgcolor="#DA851D";
headercolor="#000000";
headerbgcolor="#ffffff";
subimage=rootPath + "files/arrow.gif";
subimagepadding="2";
}

with(menuStyle=new mm_style()){
offbgcolor="#DEEFFF";
offcolor="#003366";
onbgcolor="#36537D";
oncolor="#FFFFFF";
bordercolor="#296488";
borderstyle="solid";
borderwidth=1;
separatorcolor="#2D729D";
separatorsize="1";
padding=5;
fontsize="xx-small";
fontstyle="normal";
fontfamily="Verdana, Tahoma, Arial";
fontweight="bold";
itemwidth="150";
pagecolor="black";
pagebgcolor="#DA851D";
headercolor="#000000";
headerbgcolor="#ffffff";
subimage=rootPath + "files/arrow.gif";
subimagepadding="2";
}

with(mainmenuStyle=new mm_style()){
align="center";
onbgcolor="#DEEFFF";
oncolor="#33557B";
offbgcolor="#15873C";
offcolor="#FFFFFF";
bordercolor="#296488";
borderstyle="solid";
borderwidth=1;
separatorcolor="#2D729D";
separatorsize="1";
padding=5;
fontsize="xx-small";
fontstyle="normal";
fontfamily="Verdana, Tahoma, Arial";
fontweight="bold";
pagecolor="black";
pagebgcolor="#DA851D";
headercolor="#000000";
headerbgcolor="#ffffff";
subimagepadding="2";
}

with(milonic=new menuname("Main Menu")){
style=mainmenuStyle;
top=101;
left=1;
followscroll = 1;
alwaysvisible=1;
orientation="horizontal";
position = "relative";
//aI("text=Home;showmenu=Home;");
aI("text=Главная;itemwidth=80;showmenu=Home;url=" + rootPath + "index.php;");
aI("text=Объекты учета;itemwidth=90;showmenu=Profiles;");
aI("text=Технический анализ;itemwidth=120;showmenu=InvestmentTools;");
aI("text=Экономика;itemwidth=120;showmenu=Eco;");
aI("text=Тренды;itemwidth=80;showmenu=Trends;");
aI("text=Предупреждения;itemwidth=110;showmenu=TheGCC;");
aI("text=Информация;itemwidth=70;showmenu=Info;");
}

with(milonic=new menuname("Info")){
style=menuStyle;
aI("text=О предприятии;url=" + rootPath + "index.php?sel=about");
aI("text=О программе;url=" + rootPath + "index.php?sel=about2");
}

with(milonic=new menuname("Home")){
style=menuStyle;
aI("text=Карта теплиц;url=" + rootPath + "index.php?sel=map");
aI("text=Основная мнемосхема;url=" + rootPath + "index.php?sel=mnem");
aI("text=Узлы учета по ресурсам;showmenu=UzelTypes;");
aI("text=Стандартные отчеты;showmenu=Reports;");
}

with(milonic=new menuname("UzelTypes")){
style=menuStyle;
aI("text=Учет газа;url=" + rootPath + "index.php?sel=channels2&type=3;");
aI("text=Учет воды;url=" + rootPath + "/index.php?sel=channels2&type=2;");
aI("text=Учет электроэнергии;url=" + rootPath + "/index.php?sel=channels2&type=1;");
aI("text=Учет тепла;url=" + rootPath + "/index.php?sel=channels2&type=4;");

}


with(milonic=new menuname("Reports")){
style=menuStyle;
aI("text=Отчет за очередной отчётный период о величине фактической экономии;url=" + rootPath + "index.php?sel=ecm_all;");
aI("text=Отчет о суточном потреблении ТЭР и величине экономии;url=" + rootPath + "index.php?sel=ecm_days;");
aI("text=Отчет об общей экономии;url=" + rootPath + "index.php?sel=ecm&id=1;");
aI("text=Данные мониторинга работы систем отопления по помещениям;url=" + rootPath + "index.php?sel=ecm_pom;");
}

with(milonic=new menuname("Profiles")){
style=menuStyle;
aI("text=Контроллеры учета;url=" + rootPath + "index.php?sel=devices;");
aI("text=Каналы измерения;url=" + rootPath + "index.php?sel=channels2;");
aI("text=Текущие значения;url=" + rootPath + "index.php?sel=currents;");
}

with(milonic=new menuname("Tech")){
style=submenuStyle;
aI("text=Единицы измерения;url=" + rootPath + "index.php?sel=details&name=edizm;");
aI("text=Протоколы обмена;url=" + rootPath + "index.php?sel=details&name=protocols;");
aI("text=Измеряемые параметры;url=" + rootPath + "index.php?sel=details&name=var2;");
aI("text=Виды энергоресурсов;url=" + rootPath + "index.php?sel=details&name=energy;");
}

with(milonic=new menuname("InvestmentTools")){
style=menuStyle;
aI("text=Карта температур;url=" + rootPath + "index.php?sel=tempmap;");
aI("text=Режимы работы;url=" + rootPath + "index.php?sel=regims;");
aI("text=Режимы работы по дням;url=" + rootPath + "index.php?sel=regims2;");
aI("text=Технические данные;showmenu=Tables;");
aI("text=Анализ на минимумы и максимумы;url=" + rootPath + "index.php?sel=minmax;");
aI("text=Накопительные итоги;url=" + rootPath + "index.php?sel=channels3;");
aI("text=Все архивы;showmenu=indices;");
}

with(milonic=new menuname("indices")){
style=menuStyle;
aI("text=Часовые;url=" + rootPath + "index.php?sel=archives2;");
aI("text=По дням;url=" + rootPath + "index.php?sel=archives;");
}

with(milonic=new menuname("gccindices")){
style=submenuStyle;
aI("text=Saudi Stock Exchange - Tadawul;url=" + rootPath + "interface/SubIndex.aspx?Market=1&Sector=0&Official=True;");
aI("text=Dubai Financial Market - DFM;url=" + rootPath + "interface/SubIndex.aspx?Market=2&Sector=0&Official=True;");
aI("text=Abu Dhabi Securities Exchange - ADX;url=" + rootPath + "interface/SubIndex.aspx?Market=3&Sector=0&Official=True;");
aI("text=Kuwait Stock Exchange - KSE;url=" + rootPath + "interface/SubIndex.aspx?Market=4&Sector=0&Official=True;");
aI("text=Bahrain Stock Exchange - BSE;url=" + rootPath + "interface/SubIndex.aspx?Market=5&Sector=0&Official=True;");
aI("text=Muscat Securities Market - MSM;url=" + rootPath + "interface/SubIndex.aspx?Market=6&Sector=0&Official=True;");
aI("text=Qatar Exchange - QE;url=" + rootPath + "interface/SubIndex.aspx?Market=7&Sector=0&Official=True;");
}

with(milonic=new menuname("Tables")){
style=submenuStyle;
aI("text=Типы устройств;url=" + rootPath + "index.php?sel=tables&mn=devicetype;");
aI("text=Каналы измерения;url=" + rootPath + "index.php?sel=tables&mn=channels;");
aI("text=Единицы измерения;url=" + rootPath + "index.php?sel=tables&mn=edizm;");
aI("text=Протоколы обмена;url=" + rootPath + "index.php?sel=tables&mn=protocols;");
aI("text=Измеряемые параметры;url=" + rootPath + "index.php?sel=tables&mn=var2;");
}
/*
with(milonic=new menuname("StockFilter")){
style=menuStyle;
aI("text=Pre-Designed screener;url=" + rootPath + "Interface/Free/PredesignedReports.aspx;");
aI("text=Custom screener;url=" + rootPath + "Interface/Membership/StockFilter.aspx;");
}*/

with(milonic=new menuname("Eco")){
style=menuStyle;
aI("text=Потребление по узлам;showmenu=WorkDevices;");
aI("text=Цены на энергоресурсы;url=" + rootPath + "index.php?sel=eco&id=2;");
aI("text=Расклад потребления по энергоресурсам;url=" + rootPath + "index.php?sel=eco&id=3;");
aI("text=Расклад потребления энергоресурсов по времени;url=" + rootPath + "index.php?sel=eco&id=4;");
aI("text=Стандартный отчет по экономическому эффекту;url=" + rootPath + "index.php?sel=analys;");
}

with(milonic=new menuname("WorkDevices")){
style=menuStyle;
aI("text=Расход по месяцам;url=" + rootPath + "index.php?sel=ecm2&type=4;");
aI("text=Расход по дням;url=" + rootPath + "index.php?sel=ecm2&type=2;");
aI("text=Расход по часам;url=" + rootPath + "index.php?sel=ecm2&type=1;");
}


with(milonic=new menuname("Trends")){
style=menuStyle;
aI("text=Часовые;url=" + rootPath + "index.php?sel=trends&type=1;");
aI("text=Суточные;url=" + rootPath + "index.php?sel=trends&type=2;");
aI("text=По месяцам;url=" + rootPath + "index.php?sel=trends&type=4;");
aI("text=Интервальные;url=" + rootPath + "index.php?sel=trends&type=9;");
}

with(milonic=new menuname("Resources")){
style=menuStyle;
aI("text=Электроэнергия;url=" + rootPath + "index.php?sel=trends&res=1&type=1;");
aI("text=Вода;url=" + rootPath + "index.php?sel=trends&res=2&type=1;");
aI("text=Газ;url=" + rootPath + "index.php?sel=trends&res=3&type=1;");
aI("text=Тепло;url=" + rootPath + "index.php?sel=trends&res=4&type=1;");
}

with(milonic=new menuname("TheGCC")){
style=menuStyle;
aI("text=Работоспособность оборудования;url=" + rootPath + "index.php?sel=register;");
aI("text=Журнал событий;url=" + rootPath + "index.php?sel=register2;");
}

with(milonic=new menuname("Downloads")){
	style=menuStyle;
	aI("text=Price Data;url=" + rootPath + "interface/free/download.aspx;");
	aI("text=Research Reports;showmenu=ResearchReports;url=" + rootPath + "interface/Research/ResearchCentral.aspx;");
	//aI("text=Market Reports;url=" + rootPath + "interface/DailyReports.aspx;");
	aI("text=Periodical Reports;url=" + rootPath + "interface/PeriodicalReports.aspx;");
}

with(milonic=new menuname("ResearchReports")){
	style=submenuStyle;
	aI("text=Economic Reports;url=" + rootPath + "interface/Research/ResearchList.aspx?cat=1;");
	aI("text=Market Reports;url=" + rootPath + "interface/Research/ResearchList.aspx?cat=2;");
	aI("text=Equity Reports;url=" + rootPath + "interface/Research/ResearchList.aspx?cat=3;");

}
drawMenus();

