/*

showPages v1.1
=================================

Infomation
----------------------
Author : Lapuasi
E-Mail : lapuasi@gmail.com
Web : http://www.lapuasi.com
Date : 2005-11-17


Example
----------------------
var pg = new showPages('pg');
pg.page_count = 12; //定义总页数(必要)
pg.argName = 'p';    //定义参数名(可选,缺省为page)
pg.printHtml();        //显示页数


Supported in Internet Explorer, Mozilla Firefox
*/

function showPages(name) { //初始化属性
	this.name = name;      //对象名称
	this.pagesize = 10;
	this.page = 1;         //当前页数
	this.page_count = 1;    //总页数
	this.item_count = 0;
	this.argName = 'page'; //参数名
	this.showTimes = 1;    //打印次数
}

showPages.prototype.getPage = function(){ //丛url获得当前页数,如果变量重复只获取最后一个
	var args = location.search;
	var reg = new RegExp('[\?&]?' + this.argName + '=([^&]*)[&$]?', 'gi');
	var chk = args.match(reg);
	this.page = RegExp.$1;
}
showPages.prototype.checkPages = function(){ //进行当前页数和总页数的验证
	if (isNaN(parseInt(this.page))) this.page = 1;
	if (isNaN(parseInt(this.page_count))) this.page_count = 1;
	if (this.page < 1) this.page = 1;
	if (this.page_count < 1) this.page_count = 1;
	if (this.page > this.page_count) this.page = this.page_count;
	this.page = parseInt(this.page);
	this.page_count = parseInt(this.page_count);
}
showPages.prototype.createHtml = function(mode){ //生成html代码
	var strHtml = '', prevPage = this.page - 1, nextPage = this.page + 1;
	if (mode == '' || typeof(mode) == 'undefined') mode = 0;
	switch (mode) {
		case 1 : //模式1 (页数,首页,前页,后页,尾页)
			strHtml += '<span class="count">Pages: ' + this.page + ' / ' + this.page_count + '</span>';
			strHtml += '<span class="number">';
			if (prevPage < 1) {
				strHtml += '<span title="First Page">«</span>';
				strHtml += '<span title="Prev Page">‹</span>';
			} else {
				strHtml += '<span title="First Page"><a href="javascript:' + this.name + '.toPage(1);">«</a></span>';
				strHtml += '<span title="Prev Page"><a href="javascript:' + this.name + '.toPage(' + prevPage + ');">‹</a></span>';
			}
			for (var i = 1; i <= this.page_count; i++) {
				if (i > 0) {
					if (i == this.page) {
						strHtml += '<span title="Page ' + i + '">[' + i + ']</span>';
					} else {
						strHtml += '<span title="Page ' + i + '"><a href="javascript:' + this.name + '.toPage(' + i + ');">[' + i + ']</a></span>';
					}
				}
			}
			if (nextPage > this.page_count) {
				strHtml += '<span title="Next Page">›</span>';
				strHtml += '<span title="Last Page">»</span>';
			} else {
				strHtml += '<span title="Next Page"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">›</a></span>';
				strHtml += '<span title="Last Page"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">»</a></span>';
			}
			strHtml += '</span><br />';
			break;
		case 2 : //模式1 (10页缩略,首页,前页,后页,尾页)
			strHtml += '<span class="count">Pages: ' + this.page + ' / ' + this.page_count + '</span>';
			strHtml += '<span class="number">';
			if (prevPage < 1) {
				strHtml += '<span title="First Page">«</span>';
				strHtml += '<span title="Prev Page">‹</span>';
			} else {
				strHtml += '<span title="First Page"><a href="javascript:' + this.name + '.toPage(1);">«</a></span>';
				strHtml += '<span title="Prev Page"><a href="javascript:' + this.name + '.toPage(' + prevPage + ');">‹</a></span>';
			}
			if (this.page % 10 ==0) {
				var startPage = this.page - 9;
			} else {
				var startPage = this.page - this.page % 10 + 1;
			}
			if (startPage > 10) strHtml += '<span title="Prev 10 Pages"><a href="javascript:' + this.name + '.toPage(' + (startPage - 1) + ');">...</a></span>';
			for (var i = startPage; i < startPage + 10; i++) {
				if (i > this.page_count) break;
				if (i == this.page) {
					strHtml += '<span title="Page ' + i + '">[' + i + ']</span>';
				} else {
					strHtml += '<span title="Page ' + i + '"><a href="javascript:' + this.name + '.toPage(' + i + ');">[' + i + ']</a></span>';
				}
			}
			if (this.page_count >= startPage + 10) strHtml += '<span title="Next 10 Pages"><a href="javascript:' + this.name + '.toPage(' + (startPage + 10) + ');">...</a></span>';
			if (nextPage > this.page_count) {
				strHtml += '<span title="Next Page">›</span>';
				strHtml += '<span title="Last Page">»</span>';
			} else {
				strHtml += '<span title="Next Page"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">›</a></span>';
				strHtml += '<span title="Last Page"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">»</a></span>';
			}
			strHtml += '</span><br />';
			break;
		case 4 : //模式2 (前后缩略,页数,首页,前页,后页,尾页)
			strHtml += '<span class="count">Pages: ' + this.page + ' / ' + this.page_count + '</span>';
			strHtml += '<span class="number">';
			if (prevPage < 1) {
				strHtml += '<span title="First Page">«</span>';
				strHtml += '<span title="Prev Page">‹</span>';
			} else {
				strHtml += '<span title="First Page"><a href="javascript:' + this.name + '.toPage(1);">«</a></span>';
				strHtml += '<span title="Prev Page"><a href="javascript:' + this.name + '.toPage(' + prevPage + ');">‹</a></span>';
			}
			if (this.page != 1) strHtml += '<span title="Page 1"><a href="javascript:' + this.name + '.toPage(1);">[1]</a></span>';
			if (this.page >= 5) strHtml += '<span>...</span>';
			if (this.page_count > this.page + 2) {
				var endPage = this.page + 2;
			} else {
				var endPage = this.page_count;
			}
			for (var i = this.page - 2; i <= endPage; i++) {
				if (i > 0) {
					if (i == this.page) {
						strHtml += '<span title="Page ' + i + '">[' + i + ']</span>';
					} else {
						if (i != 1 && i != this.page_count) {
							strHtml += '<span title="Page ' + i + '"><a href="javascript:' + this.name + '.toPage(' + i + ');">[' + i + ']</a></span>';
						}
					}
				}
			}
			if (this.page + 3 < this.page_count) strHtml += '<span>...</span>';
			if (this.page != this.page_count) strHtml += '<span title="Page ' + this.page_count + '"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">[' + this.page_count + ']</a></span>';
			if (nextPage > this.page_count) {
				strHtml += '<span title="Next Page">›</span>';
				strHtml += '<span title="Last Page">»</span>';
			} else {
				strHtml += '<span title="Next Page"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">›</a></span>';
				strHtml += '<span title="Last Page"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">»</a></span>';
			}
			strHtml += '</span><br />';
			break;
		case 8 : //模式3 (箭头样式,首页,前页,后页,尾页) (only IE)
			strHtml += '<span class="count">Pages: ' + this.page + ' / ' + this.page_count + '</span>';
			strHtml += '<span class="arrow">';
			if (prevPage < 1) {
				strHtml += '<span title="First Page">9</span>';
				strHtml += '<span title="Prev Page">7</span>';
			} else {
				strHtml += '<span title="First Page"><a href="javascript:' + this.name + '.toPage(1);">9</a></span>';
				strHtml += '<span title="Prev Page"><a href="javascript:' + this.name + '.toPage(' + prevPage + ');">7</a></span>';
			}
			if (nextPage > this.page_count) {
				strHtml += '<span title="Next Page">8</span>';
				strHtml += '<span title="Last Page">:</span>';
			} else {
				strHtml += '<span title="Next Page"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">8</a></span>';
				strHtml += '<span title="Last Page"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">:</a></span>';
			}
			strHtml += '</span><br />';
			break;
		case 16 : //模式6
			strHtml += '<ul>';
			if (prevPage < 1) {
				strHtml += '<li class="disabled"><a href="javascript:;">«</a></li>';
				strHtml += '<li class="disabled"><a href="javascript:;">‹</a></li>';
			} else {
				strHtml += '<li><a href="javascript:' + this.name + '.toPage(1);">«</a></li>';
				strHtml += '<li><a href="javascript:' + this.name + '.toPage('+prevPage+');">‹</a></li>';
			}
			if (this.page != 1) strHtml += '<li><a href="javascript:' + this.name + '.toPage(1);">[1]</a></li>';
			if (this.page >= 5) strHtml += '<li class="disabled"><a href="javascript:;">...</a></li>';
			if (this.page_count > this.page + 2) {
				var endPage = this.page + 5;
			} else {
				var endPage = this.page_count;
			}
			for (var i = this.page - 2; i <= endPage; i++) {
				if (i > 0) {
					if (i == this.page) {
						strHtml += '<li class="active" title="Page ' + i + '"><a href="javascript:;">[' + i + ']</a></li>';
					} else {
						if (i != 1 && i != this.page_count) {
							strHtml += '<li title="Page ' + i + '"><a href="javascript:' + this.name + '.toPage(' + i + ');">[' + i + ']</a></li>';
						}
					}
				}
			}
			if (this.page + 3 < this.page_count) strHtml += '<li class="disabled"><a href="javascript:;">...</a></li>';
			if (this.page != this.page_count) strHtml += '<li title="Page ' + this.page_count + '"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">[' + this.page_count + ']</a></li>';
			if (nextPage > this.page_count) {
				strHtml += '<li class="disabled" title="Next Page"><a href="javascript:;">›</a></li>';
				strHtml += '<li class="disabled" title="Last Page"><a href="javascript:;">»</a></li>';
			} else {
				strHtml += '<li title="Next Page"><a href="javascript:' + this.name + '.toPage(' + nextPage + ');">›</a></li>';
				strHtml += '<li title="Last Page"><a href="javascript:' + this.name + '.toPage(' + this.page_count + ');">»</a></li>';
			}
			strHtml += '</ul>';
			break;
		case 32 : //模式5 (输入框)
			// strHtml += '<div>';
			if (this.page_count < 1) {
				strHtml += '<input type="text" name="toPage" value="没有数据" class="itext input-small" disabled="disabled">';
				strHtml += '<input type="button" name="go" value="跳转" class="ibutton" disabled="disabled"></option>';
			} else {
				strHtml += '<input type="text" value="跳转到:" class="ititle input-small" readonly="readonly">';
				strHtml += '<input type="text" id="pageInput' + this.showTimes + '" value="' + this.page + '" class="itext span1" title="Input page" onkeypress="return ' + this.name + '.formatInputPage(event);" onfocus="this.select()">';
				// strHtml += '<input type="text" value=" / ' + this.page_count + '" class="icount" readonly="readonly">';
				strHtml += '<button type="button" name="go" class="btn" onclick="' + this.name + '.toPage(document.getElementById(\'pageInput' + this.showTimes + '\').value);">跳转</button>';
			}
			// strHtml += '</div>';
			break;
		case 64 : //模式4 (下拉框)
			if (this.page_count < 1) {
				strHtml += '<select name="toPage" disabled>';
				strHtml += '    <option value="1">没有数据</option>';
			} else {
				var chkSelect;
				strHtml += '<select name="toPage" class="pull-right input-small" onchange="' + this.name + '.toPage(this);">';
				for (var i = 1; i <= this.page_count; i++) {
					if (this.page == i) chkSelect=' selected="selected"';
					else chkSelect='';
					strHtml += '    <option value="' + i + '"' + chkSelect + '>分页: ' + i + ' / ' + this.page_count + '</option>';
				}
			}
			strHtml += '</select>';
			break;
		case 128 : //模式7
			strHtml += "<select class=\"form-control page-select select-search input-small pull-right\" name=\"pagesize\" onchange=\"" +this.name+ ".modifySize(this)\">";
			strHtml += "    <option value=\"all\">全部</option>";
			for (var i in {5:5, 10:10, 15:15, 20:20, 50:50, 100:100}) {
				var is_selected = this.pagesize == i ? 'selected' : '';
				strHtml += "    <option value=\"" + i + "\" " + is_selected + ">" + i + "</option>";
			}
			strHtml += "</select>";
			break;
		case 256 : //
			console.log(1);
			strHtml += "<div class=\"dataTables_info\">共 " + this.item_count + " 件商品 当前第 " + this.page + "/" + this.page_count + " 页</div>";
			break;
		default :
			strHtml = 'Javascript showPage Error: not find mode ' + mode;
			break;
	}
	return strHtml;
}
showPages.prototype.createUrl = function (page, size) { //生成页面跳转url
	if (isNaN(parseInt(page))) page = 1;
	if (page < 1) page = 1;
	if (page > this.page_count) page = this.page_count;
	var url = location.protocol + '//' + location.host + location.pathname;
	var args = location.search;
	var reg = new RegExp('([\?&]?)' + this.argName + '=[^&]*[&$]?', 'gi');
	args = args.replace(reg,'$1');
	if (args == '' || args == null) {
		args += '?' + this.argName + '=' + page;
	} else if (args.substr(args.length - 1,1) == '?' || args.substr(args.length - 1,1) == '&') {
			args += this.argName + '=' + page;
	} else {
			args += '&' + this.argName + '=' + page;
	}
	if (typeof size != 'undefined') {
		var reg = new RegExp('([\?&]?)pagesize=[^&]*[&$]?', 'gi');
		args = args.replace(reg,'$1');
		args += '&pagesize=' + size;
	}
	return url + args;
}
showPages.prototype.toPage = function(page){ //页面跳转
	var turnTo = 1;
	if (typeof(page) == 'object') {
		turnTo = page.options[page.selectedIndex].value;
	} else {
		turnTo = page;
	}
	self.location.href = this.createUrl(turnTo);
}
showPages.prototype.modifySize = function(size){ //页面跳转
	var pagesize = 10;
	if (typeof size == 'object') {
		pagesize = size.options[size.selectedIndex].value;
	} else {
		pagesize = size;
	}
	self.location.href = this.createUrl(this.page, pagesize);
}
showPages.prototype.printHtml = function(mode){ //显示html代码
	var pageHtml = "";
	this.getPage();
	this.checkPages();
	document.write('<div id="pages_' + this.name + '_' + this.showTimes + '"></div>');
	for (var i = 256; i >= 1;) {
		if ((mode & i) > 0) {
			pageHtml += this.createHtml(i);
		}
		i /= 2;
	}
	document.getElementById('pages_' + this.name + '_' + this.showTimes).innerHTML = pageHtml;
	document.getElementById('pages_' + this.name + '_' + this.showTimes).onchange = function(){
		console.log(this);
	}
	
}
showPages.prototype.formatInputPage = function(e){ //限定输入页数格式
	var ie = navigator.appName=="Microsoft Internet Explorer" ? true : false;
	if(!ie) var key = e.which;
	else var key = event.keyCode;
	if (key == 8 || key == 46 || (key >= 48 && key <= 57)) return true;
	return false;
}