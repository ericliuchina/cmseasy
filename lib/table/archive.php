<?php

class archive extends table {
    function getcols($act) {
        switch ($act) {
            case 'list':
                return 'aid,title,catid,catid,tag,strong,toppost,color,spid,introduce,keyword,view,adddate,userid,author,image,thumb,content,checked,linkto,ispages,attr3'.$this->mycols();
            case 'modify':
                return 'aid,title,catid,catid,tag,spid,introduce,introduce_len,description,keyword,image,thumb,content,checked,template,showform,pics,linkto,mtitle,description,keyword,htmlrule,ishtml,province_id,city_id,section_id,attr1,attr2,attr3,adddate'.$this->mycols();
            case 'manage':
                return 'aid,title,username,catid,catid,spid,adddate,view,checked,linkto';
            case 'user_modify':
                return 'aid,title,catid,catid,introduce,keyword,image,content,attachment'.$this->mycols();
            case 'user_manage':
                return 'aid,title,username,catid,catid,adddate,view,checked';
            default: return '1';
        }
    }
    function get_verify() {
        return array(
        );
    }
    function get_form() {
        return array(
                'catid'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(category::option(0,'tolast')),
                        'default'=>intval(get('catid')),
                        'regex'=>'/\d+/',
                        'filter'=>'is_numeric',
                ),
                'typeid'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(type::option(0,'tolast')),
                        'default'=>intval(get('typeid')),
                        'regex'=>'/\d+/',
                        'filter'=>'is_numeric',
                ),
				'toppost'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(array(0=>'不置顶',2=>'栏目置顶',3=>'全站置顶')),
                        'default'=>0,
                        'regex'=>'/\d+/',
                        'filter'=>'is_numeric',
                ),
                'ishtml'=>array(
                        'selecttype'=>'radio',
                        'select'=>form::arraytoselect(array(0=>'继承',1=>'生成',2=>'不生成')),
                ),
                'checked'=>array(
                        'selecttype'=>'radio',
                        'select'=>form::arraytoselect(form::yesornotoarray('审核')),
                ),
                'image'=>array(
                        'filetype'=>'image',
                ),
                'thumb'=>array(
                        'filetype'=>'thumb',
                ),
                'displaypos'=>array(
                        'selecttype'=>'checkbox',
                        //'select'=>form::arraytoselect(array(1=>'首页推荐',2=>'首页焦点',3=>'首页头条',4=>'列表页推荐',5=>'内容页推荐')),
                ),
                'htmlrule'=>array(
                        //'tips'=>" 默认：{?category::gethtmlrule(get('id'),'showhtmlrule')}",
                ),
                'template'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(front::$view->archive_tpl_list('archive/show')),
                        //'tips'=>" 默认：{?category::gettemplate(get('id'),'showtemplate')}",
                ),
                'showform'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(get_my_tables_list()),
                        'default'=>"0",
                ),
                'introduce_len'=>array(
                        'default'=>config::get('archive_introducelen')
                ),
                'attr1'=>array(
                        'selecttype'=>'checkbox',
                        'select'=>form::arraytoselect($this->getattrs(1)),
                ),
                'grade'=>array(
                        'selecttype'=>'radio',
                        'select'=>form::arraytoselect(array(0,1,2,3,4,5)),
                ),
                'pics'=>array(
                        'filetype'=>'image2',
                ),
                'author'=>array(
                        'tips'=>' ',
                ),
                'attr3'=>array(
                        'tips'=>' ',
                ),
                'htmlrule'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(getHtmlRule('archive')),
                        'default'=>'',
                ),
        		'tag_option'=>array(
        				'selecttype'=>'select',
        				'select'=>form::arraytoselect(tag::getTags()),
        		),
        );
    }
    function get_form_field() {
        $arr=array(0=>'全站使用');
        return array(
                'catid'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(category::option(0,'tolast',$arr)),
                        'default'=>intval(get('catid')),
                        'regex'=>'/\d+/',
                        'filter'=>'is_numeric',
                ),
                'ishtml'=>array(
                        'selecttype'=>'radio',
                        'select'=>form::arraytoselect(array(0=>'继承',1=>'生成',2=>'不生成')),
                ),
                'checked'=>array(
                        'selecttype'=>'radio',
                        'select'=>form::arraytoselect(form::yesornotoarray('审核')),
                ),
                'image'=>array(
                        'filetype'=>'image',
                ),
                'displaypos'=>array(
                        'selecttype'=>'checkbox',
                        'select'=>form::arraytoselect(array(1=>'首页推荐',2=>'首页焦点',3=>'首页头条',4=>'列表页推荐',5=>'内容页推荐')),
                ),
                'htmlrule'=>array(
                        //'tips'=>" 默认：{?category::gethtmlrule(get('id'),'showhtmlrule')}",
                ),
                'template'=>array(
                        'selecttype'=>'select',
                        'select'=>form::arraytoselect(front::$view->archive_tpl_list()),
                        //'tips'=>" 默认：{?category::gettemplate(get('id'),'showtemplate')}",
                ),
                'introduce_len'=>array(
                        'default'=>config::get('archive_introducelen'),
                ),
                'attr1'=>array(
                        'selecttype'=>'checkbox',
                        'select'=>form::arraytoselect($this->getattrs(1)),
                ),
                'author'=>array(
                        'tips'=>' ',
                ),
                'attr3'=>array(
                        'tips'=>' ',
                ),
        );
    }
    public function get_where($act) {
        switch ($act) {
            case 'list':
                return '';
            case 'manage':
                $where='aid>0';
                if (front::get('needcheck')) $where .=" and checked=0";
                return $where;
            case 'user_manage':
                $where='aid>0';
                if (front::get('needcheck')) $where .=" and checked=0";
                return $where;
            default: return '0';
        }
    }
    public static function getInstance() {
        $class=new archive();
        return $class;
    }
    static function url($info,$page=null,$relative=false) {
        if ($info['linkto']) return $info['linkto'];
        
        if(front::$get['t'] == 'wap'){
        	if (config::get('wap_html_prefix')){
        		$html_prefix='/'.trim(config::get('wap_html_prefix'),'/');
        	}
        	if(front::$rewrite){
        		if (!$page){
        			return config::get('site_url').'show_wap_'.$info['aid'].'.htm';
        		}else{
        			return config::get('site_url').'show_wap_'.$info['aid'].'_'.$page.'.htm';
        		}
        	}
        	$type=category::getInstance();
        	if($info['iswaphtml'] == 2){
        		return url::create('archive/show/t/wap/aid/'.$info['aid']);
        	}
        	
        	if (!category::getarciswaphtml($info)){
        		if ($page){
        			return url::create('archive/show/t/wap/aid/'.$info['aid'].'/page/'.$page);
	        	}else{
	        		return url::create('archive/show/t/wap/aid/'.$info['aid']);
	        	}
        	}else {
        		if ($info['htmlrule']){
        			$rule=$info['htmlrule'];
        		}else{
        			$rule=category::gethtmlrule($info['catid'],'showhtmlrule');
        		}
        		$rule=str_replace('{$caturl}',$type->htmlpath($info['catid']),$rule);
        		$rule=str_replace('{$dir}',$type->category[$info['catid']]['htmldir'],$rule);
        		$rule=str_replace('{$catid}',$info['catid'],$rule);
        		$rule=str_replace('{$aid}',$info['aid'],$rule);
        		if ($page){
        			$rule=str_replace('{$page}',$page,$rule);
        		}else{
        			$rule=preg_replace('/\(.*?\)/','',$rule);
        			$rule=str_replace('_{$page}','',$rule);
        		}
        		$rule=preg_replace('/[\(\)]/','',$rule);
        		$rule=preg_replace('%[\\/]index\.htm1%','',$rule);
        		$rule=rtrim($rule,'/');
        		$rule=trim($rule,'\\');
        		if ($relative) return $html_prefix.'/'.$rule;
        		return config::get('base_url').$html_prefix.'/'.$rule;
        	}
        }
        
        if (config::get('html_prefix')) $html_prefix='/'.trim(config::get('html_prefix'),'/');
        $type=category::getInstance();
        if($info['ishtml'] == 2){
        	return url::create('archive/show/aid/'.$info['aid']);
        }
        if (!category::getarcishtml($info) ||front::$rewrite) if ($page) return url::create('archive/show/aid/'.$info['aid'].'/page/'.$page);
            else return url::create('archive/show/aid/'.$info['aid']);
        else {
            if ($info['htmlrule']) $rule=$info['htmlrule'];
            else $rule=category::gethtmlrule($info['catid'],'showhtmlrule');
            $rule=str_replace('{$caturl}',$type->htmlpath($info['catid']),$rule);
            $rule=str_replace('{$dir}',$type->category[$info['catid']]['htmldir'],$rule);
            $rule=str_replace('{$catid}',$info['catid'],$rule);
            $rule=str_replace('{$aid}',$info['aid'],$rule);
            if ($page){
                $rule=str_replace('{$page}',$page,$rule);
            }else{
                $rule=preg_replace('/\(.*?\)/','',$rule);
                $rule=str_replace('_{$page}','',$rule);
            }
            $rule=preg_replace('/[\(\)]/','',$rule);
            $rule=preg_replace('%[\\/]index\.htm1%','',$rule);
            $rule=rtrim($rule,'/');
            $rule=trim($rule,'\\');
            if ($relative) return $html_prefix.'/'.$rule;
            return config::get('base_url').$html_prefix.'/'.$rule;
        }
    }
    static function countarchiveformtype($catid) {
        $arc=archive::getInstance();
        return $arc->rec_count('typeid='.$catid);
    }
    static function countarchiveformcategory($catid) {
        $arc=archive::getInstance();
        return $arc->rec_count('catid='.$catid);
    }
    function getattrs($att_order=1) {
        $attr='attr'.$att_order;
        $sets=settings::getInstance()->getrow(array('tag'=>'table-archive'));
        if (!is_array($sets)) return;
        $data=unserialize($sets['value']);
        preg_match_all('%\(([\d\w\/\.-]+)\)(\S+)%m',$data[$attr],$result,PREG_SET_ORDER);
        $data=array();
        foreach ($result as $res)
            $data[$res[1]]=$res[2];
        return $data;
    }
    static function getgrade($grade) {
        $count=5;
        $path=config::get('base_url').'/';
        $star1="<img src=\"{$path}images/star1.gif\" border=\"0\" />";
        $star2="<img src=\"{$path}images/star2.gif\" border=\"0\" />";
        $str="";
        for ($i=0;$i <$count;$i++) {
            if ($i <$grade) {
                $str .= $star1;
            }
            else {
                $str .= $star2;
            }
        }
        return $str;
    }
}