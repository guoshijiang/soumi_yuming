function getLength(str){
	return str.replace(/[^\x00-\xff]/g,"xxx").length;
    //[^\x00-\xff]即ASCII 编码不在0-255的字符
}
//不能用相同字符
function findStr(str,n){
	var tmp = 0;
	for (var i = 0; i < str.length; i++) {
		if(str.charAt(i)==n){
		tmp++
	 }
	}
	return tmp;
}
window.onload = function () {
	var aInput = document.getElementsByTagName('input');
	var oName = aInput[2];
    var oPhone = aInput[3];
	var pwd = aInput[4];
	var pwd2 = aInput[5];
    var ap = document.getElementsByClassName('msg');
    var name_msg = ap[0];
    var oPhone_msg = ap[1];
    var pwd_msg = ap[2];
    var pwd2_msg = ap[3];
    var count = document.getElementById('count');
    var aEm = document.getElementsByTagName('em');
    var name_length = 0;
    //密码
    pwd.onfocus = function(){
    	pwd_msg.style.display = "inline-block";
    	pwd_msg.innerHTML = '<i class="ati"></i>6~16个字符.最好是数字和字母混合'
    }
    pwd.onkeyup = function(){
    	//大于5个字符  大于10个字符
    	if(this.value.length>5){
    		aEm[1].className = 'active';
    		pwd2_msg.style.display ='block';
    	}else{
    		aEm[1].className = "";
    		pwd2_msg.style.display ='none';
    	}
    	if(this.value.length>10){
    		aEm[2].className = 'active';
    	}else{
    		aEm[2].className = "";
    	}

    }
    pwd.onblur = function(){
    	//不能为空 不能用相同字符 长度为6~16个字符 不能全为数字 不能全为字母  OK
    	var m = findStr(pwd.value , pwd.value[0]);
    	var re_n = /[^\d]/g;
    	var re_t = /[^a-zA-Z]/g;
    	if(this.value==""){
    		pwd_msg.innerHTML = '<i class="err"></i>不能为空'
         }else if(this.value.length<6||this.value.length>16){
         	pwd_msg.innerHTML ='<i class="err"></i>长度应为6~16个字符.最好是数字，字母和特殊字符混合'
         }else{
         	pwd_msg.innerHTML ='<i class="ok"></i>OK'
         }
    }
    //确认密码
    pwd2.onblur = function(){
        if(this.value!=pwd.value){
        	pwd2_msg.innerHTML = '<i class="err"></i>两次输入密码不一致'
        }else{
         	pwd2_msg.innerHTML ='<i class="ok"></i>OK'
         }
    }
}