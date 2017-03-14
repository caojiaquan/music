
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
    <div id="VisitorInfo">
        当前访客身份：
        <?php echo $loginUser -> username;?> [ <a href="welcome/login_out">退出</a> ]
        <span id="OSC_Notification">
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
    </div>
    <div id="SearchBar">
        <form action="#">
            <input name="user" value="154693" type="hidden">
            <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
            <input class="SUBMIT" value="搜索" type="submit">
        </form>
    </div>
    <div class="clear"></div>
</div>