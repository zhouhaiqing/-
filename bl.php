<?php


/*
	AAE      征信报告
	AAF      特许经营协议
	AAH		 门店租赁合同
*/


//类型参数定义：
    const TYPE_USER  = 1;
    const TYPE_STORE = 2;

    protected $_types = [
        self::TYPE_USER  => "个人信息",
        self::TYPE_STORE => "门店信息"
    ];

    //客户类型
    const TYPE_SUBJECT_LEGAL   = 1;
    const TYPE_SUBJECT_NATURAL = 2;

    protected $_subjectTypes = [
        self::TYPE_SUBJECT_LEGAL   => "法人",
        self::TYPE_SUBJECT_NATURAL => "自然人"
    ];

    //证件类型
    const TYPE_LICENSE_NO     = 1;
    const TYPE_LEGAL_REGISTRY = 2;
    const TYPE_ID_CARD        = 3;
    const TYPE_PASSPORT       = 4;
    const TYPE_MTPS           = 5;
    const TYPE_PERMIT         = 6;
    const TYPE_MOC            = 7;

    protected $_idTypes = [
        self::TYPE_LICENSE_NO     => "营业执照编号",
        self::TYPE_LEGAL_REGISTRY => "法人登记证",
        self::TYPE_ID_CARD        => "身份证",
        self::TYPE_PASSPORT       => "护照",
        self::TYPE_MTPS           => "台胞证",
        self::TYPE_PERMIT         => "返乡证",
        self::TYPE_MOC            => "军官证",
    ];

    //申请状态
    const STATUS_APPLY_INITAL  = 1;
    const STATUS_APPLY_PENDING = 2;
    const STATUS_APPLY_SUCCESS = 3;
    const STATUS_APPLY_FAILED  = 4;
    const STATUS_APPLY_INVALID = 5;

    protected $_applyStatusList = [
        self::STATUS_APPLY_INITAL  => "初始状态",
        self::STATUS_APPLY_PENDING => "待审核",
        self::STATUS_APPLY_SUCCESS => "授信审批通过",
        self::STATUS_APPLY_FAILED  => "授信审批不通过",
        self::STATUS_APPLY_INVALID => "申请已失效",
    ];

    //审批授信额度类型
    const TYPE_CREDIT_AMOUNT_CYCLE = 1;
    const TYPE_CREDIT_AMOUNT_ONCE  = 2;

    protected $_creditAmountTypes = [
        self::TYPE_CREDIT_AMOUNT_CYCLE => "循环使用额度",
        self::TYPE_CREDIT_AMOUNT_ONCE  => "一次性额度",
    ];

    //放款状态
    const STATUS_LOAD_PENDING = 2;
    const STATUS_LOAD_SUCCESS = 3;
    const STATUS_LOAD_FAILED  = 4;
    const STATUS_LOAD_FULFIL  = 5;

    protected $_loadStatusList = [
        self::STATUS_LOAD_PENDING => "待审批",
        self::STATUS_LOAD_SUCCESS => "审批通过",
        self::STATUS_LOAD_FAILED  => "审批不通过",
        self::STATUS_LOAD_FULFIL  => "放款完成",
    ];

    //协议状态
    const STATUS_CREDIT_PROTOCOL_UNACTIVE  = 1;
    const STATUS_CREDIT_PROTOCOL_ACTIVE    = 2;
    const STATUS_CREDIT_PROTOCOL_ANNULMENT = 3;
    const STATUS_CREDIT_PROTOCOL_PAUSE     = 4;
    const STATUS_CREDIT_PROTOCOL_EPSTOPED  = 5;

    protected $_creditProtocolStatusList = [
        self::STATUS_CREDIT_PROTOCOL_UNACTIVE  => "未生效",
        self::STATUS_CREDIT_PROTOCOL_ACTIVE    => "已生效",
        self::STATUS_CREDIT_PROTOCOL_ANNULMENT => "已终止",
        self::STATUS_CREDIT_PROTOCOL_PAUSE     => "暂停",
        self::STATUS_CREDIT_PROTOCOL_EPSTOPED  => "异常终止",
    ];


//select * from (select u.code,count(*) as num, s.mdkhmc, s.mdkhyh, s.mdkhzh from user u LEFT JOIN user_store_rel ur on u.`code`=ur.user_code LEFT JOIN store s on s.erp_code = ur.store_code where u.role="J" and s.mdkhmc != '' group by u.code) dd where dd.num > 1

/*
	使用ssh通道：119.29.66.232：22  zhouhaiqing/ec9f18c5d8f
	测试库：sma-test/10.8.15.9/3306/sma_w/123456
*/

//同步用户数据
$user_dataa = sync_ehr_store::get_user_data_from_ehr()
$data = [];
        foreach ($user_data as $v) {
            $data[] = [
                'hrid' => $v['HRID'],
                'mobile' => $v['MOBILE'],
                'sfzh' => $v['SFZH'],
                'sex' => $v['SEX'],
                'code' => $v['WORKCODE'],
                'name' => $v['ACCOUNTNAME'],
                'bankno' => $v['ACOUNTID'],
                'bankname' => $v['BANKNAME'],
                'network' => $v['SUBBRANCH'],
                'provicename' => $v['PROVINCE'],
                'cityname' => $v['CITY'],
                'status' => $v['STATUS'],
                'idcard' => $v['IDCARD'],
                'nativeplace' => $v['NATIVEPLACE'],
                'birthday' => $v['BIRTHDAY'],
                'hiredate' => $v['HIREDATE'],
                'folk' => $v['FOLK'],
                'maritalstatus' => $v['MARITALSTATUS'],
                'email' => $v['EMAIL'],
                'QQ' => $v['QQ'],
                'erpcode' => $v['DEPARTMENTID'],
                'role' => $v['POSTNAME'],
                'employeeid' => $v['POSTID'],
                'emptype' => $v['DEPTTYPE'],
                'position' => $v['POSITIONNAME'],
            ];
        }
        sync_ehr_store::insert_data_tpl('user_info', $data);

//同步store_sale表字段：
if_any('/get_store_sale_by_code', function() {
    $store_codes = array_chunk(dao('store')->get_all_store_code(), 500);
    for ($i = -22; $i < 0; $i++) {
        foreach ($store_codes as $v) {
            $store_code = implode(',', $v);
            $sale_date = date('Y/m/d', strtotime("{$i}days"));
            erp_proxy::get_store_sale($store_code, $sale_date);
        }
    }
    dd(111);
});


<HRZGZD>
    <HRID>2a01d791-04ca-480b-8f83-2039172a1073</HRID> 
    <MOBILE>13423929690</MOBILE> //移动电话
    <SFZH>362302196711201037</SFZH> //身份证号码
    <LASTNAME>黄玉友</LASTNAME>  //姓名
    <SFJMRY>0</SFJMRY> //是否加盟商(1代表是,0代表否)
    <SEX>1</SEX> //性别
    <WORKCODE>20020912002</WORKCODE> //员工编号
    <ACCOUNTNAME>黄玉友</ACCOUNTNAME> //银行卡开户名
    <ACOUNTID>6217007200052939439</ACOUNTID> //银行卡账号
    <BANKNAME>中国建设银行</BANKNAME> //银行名称
    <SUBBRANCH>鸿瑞支行</SUBBRANCH> //账号支行
    <PROVINCE>广东</PROVINCE> //省份
    <CITY>深圳</CITY> //城市
    <STATUS>在岗员工</STATUS>  //人员任职状态(在岗员工 多任职结束 离职 休假员工 试用 任职终止)
    <IDCARD>362302196711201037</IDCARD> //身份证号码
    <NATIVEPLACE>江西省上饶市</NATIVEPLACE> //籍贯
    <BIRTHDAY>1967-11-20</BIRTHDAY> //出生日期
    <HIREDATE>2002-09-12</HIREDATE> //入职日期
    <FOLK>汉族</FOLK> //名字
    <POLICY>NULL</POLICY> //政治面貌
    <MARITALSTATUS>已婚已育</MARITALSTATUS> //婚姻状况
    <EMAIL>NULL</EMAIL> //邮箱
    <QQ>NULL</QQ> //QQ
    <SUBCOMPANYID>60755010027</SUBCOMPANYID> //工作单位
    <DEPARTMENTID>60755010025</DEPARTMENTID> //作部门
    <DEPTTYPE>非门店</DEPTTYPE> //区分门店/总部
    <POSTID>HZX0001</POSTID> //岗位ID
    <POSTNAME>恒之信总经理</POSTNAME> //岗位name=EHR中职位，未来门店的职位
    <POSITIONNAME>总监</POSITIONNAME> //职务，未来总部的职务
    <STATE>1</STATE> //0兼职； 1主职
    <SFJRJJH>1</SFJRJJH> //是否加入基金会
    <JRJJHRQ>2017-03-28</JRJJHRQ> //加入基金会日期
    <JJHHF>20</JJHHF> //基金会会费
    <ZHXGRQ>2018-11-16T09:38:52+08:00</ZHXGRQ> //接口中人员最后修改日期字段
    <DG>NULL</DG> //员工顶岗标记- 2018年10月11日添加(如果为1代表顶岗店长)
    <SFXN>NULL</SFXN> //是否虚拟角色
    <DYRYBH>NULL</DYRYBH> //虚拟对应
  </HRZGZD>
  
  
  
     protected function get_store_info ()
    {
        $store_data = sync_ehr_store::get_store_data_from_ehr();
        $store_data = $this->get_entire_store_data_from_erp($store_data);
        $data=[];
        foreach ($store_data as $k => $v) {
            $data[] = [
                'ehr_code' => $v['DEPTCODE'],
                'org_code' => $v['ERPCODE'],
                'erp_code' => isset($v['ERPDATA']['customercode']) ? $v['ERPDATA']['customercode'] : 'NULL',
                'store_name' => $v['DEPTNAME'],
                'store_type' => $v['MDLX'],
                'store_tel' => $v['DEPTPHONE'],
                'address' => $v['ADDRESS'],
                'dqzhye' => $v['DQZHYE'],
                'yerq' => $v['YERQ'],
                'mdkhzh' => $v['MDKHZH'],
                'mdkhmc' => $v['MDKHMC'],
                'mdkhyh' => $v['MDKHYH'],
                'yyzzbh' => $v['YYZZBH'],
                'city' => $v['CITY'],
                'state' => $v['STATE'] == 1 ? 'O' : 'C',
                'dz_name' => $v['DZNAME'],
                'dz_code' => $v['DZCODE'],
                'dz_tel' => $v['DZTEL'],
                'pq_name' => $v['PQNAME'],
                'pq_code' => $v['PQCODE'],
                'pq_tel' => $v['PQTEL'],
                'pqrs_name' => $v['PQRSNAME'],
                'pqrs_code' => $v['PQRSCODE'],
                'pqrs_tel' => $v['PQRSTEL'],
                'jms_name' => $v['JMSNAME'],
                'jms_code' => $v['JMSCODE'],
                'jms_tel' => $v['JMSTEL'],
                'jms_sfzh' => $v['JMSSFZH'],
                'pszx_name' => isset($v['ERPDATA']['dutyorgname']) ? $v['ERPDATA']['dutyorgname'] : 'NULL',
                'pszx_code' => isset($v['ERPDATA']['dutyorgcode']) ? $v['ERPDATA']['dutyorgcode'] : 'NULL',
            ];
        }
        sync_ehr_store::insert_data_tpl('store_info', $data);
        dd(count($store_data));
    }
	
	
	
        $store_codes = array_chunk(dao('store')->get_all_store_code(), 10);
        $days = floor((time() - strtotime(date('2018-08-01 00:00:00')))/86400);
        $days1 = floor((time() - strtotime(date('2018-08-31 00:00:00')))/86400);

        foreach ($store_codes as $v) {
            $data['store_code'] = implode(',', $v);
            for ($i = -$days; $i <= -$days1; $i++) {
                $data['sale_date'] = date('Y/m/d', strtotime("${i} days"));
                erp_proxy::get_store_sale($data['store_code'], $data['sale_date']);
            }
        }

        var_dump(222);
        dd(111);
		
		//同步数据
        $store_codes = array_chunk(dao('store')->get_all_store_code(), 10);

        $day = floor((time() - strtotime(date('2018-11-01')))/86400);
        for ($i = -$day; $i < 0; $i++) {
            foreach ($store_codes as $v) {
                $data['store_code'] = implode(',', $v);
                $data['sale_date'] = date('Y/m/d', strtotime("${i} days"));
                erp_proxy::get_store_sale($data['store_code'], $data['sale_date']);
            }
        }
        var_dump(111);
        dd(333);
		
		
		protected function factor_loan_apply($token, $sms_code, $store_list)
    {
        $this->sms_verify_code($token, $sms_code, 'fksq');
        if (empty($store_list)) {
            throw new FactorException('请至少选择一家门店');
        }
        foreach ($store_list as $v) {
            $param = [
                'protocolNO' => $v['protocolNO'],
                'customerNO' => $v['customerNO'],
                'applyLoanAmount' => $v['applyLoanAmount'],
            ];
            $res = $this->factor_contract_protocoldetail($v['protocolNO']);
            $protocolInfo = $res['data']['protocol'];
            $storeList = $res['data']['loanSubjectList'];
            foreach ($storeList as $val) {
                if ($val['customerNO'] == $v['customerNO']) {
                    if ($v['applyLoanAmount'] > $protocolInfo['creditAmount']) {
                        throw new FactorException($val['customerName'] . ': 申请金额超出协议授信额度');
                    }
                    if ($v['applyLoanAmount'] > $val['balanceAmount']) {
                        throw new FactorException($val['customerName'] . ': 申请金额超出剩余可融资放款额度');
                    }
                    if ($protocolInfo['astrictInd'] == 1 && $v['applyLoanAmount'] > $val['creditAmount']) {
                        throw new FactorException($val['customerName'] . ': 申请金额超出门店可融资最高限额');
                    }
                    if ($v['applyLoanAmount'] > $protocolInfo['unitLoanLimit']) {
                        throw new FactorException($val['customerName'] . ': 申请金额超出单笔融资款最高额度');
                    }
                }
            }
            $data = $this->remote_post('factorth/api/loan/apply', $param);
            $rst = json_decode($data, true);
            if ($rst['errorCode'] != 0) {
                throw new FactorException($rst['errorMsg']);
            }
        }
        //放款申请成功之后,修改加盟商的保理状态为6
        $result = $this->get_user_state_by_token($token);
        if ($result['state'] == 5) {
            $this->change_user_state($token, '6');
        }
        return [
            'error_code' => 0,
            'message' => '申请成功'
        ];
    }
		
		
	$data = [
            'MS_DH' => 'BF0000016',                            //百果秘书单号
            'SHENQR_XM' => '南京市秦淮区美林苑店',             //申请人
            'SHENQR_GH' => '20141211001',            //申请人工号
            'MS_SQLX' => '1',              //借款申请类型
            'SHENQRQ' => date('Ymd'),                //申请日期
            'JIAMS_XM' => '宫秀才',              //加盟商姓名
            'JIAMS_GH' => '20141211001',             //加盟商工号
            'JIAMS_SJH' => '17304470689',              //加盟商手机号
            'SHENQSM' => 'asd',                             //申请说明
            'MEND_DM_ERP_CODE' => '80025010147',  //门店代码ERP
            'MEND_DM_EHR_CODE' => '770147',  //门店代码EHR
            'MEND_MX' => '南京市秦淮区美林苑店',         //名店名称
            'MEND_QYMC' => '',                              //门店所在区域名称
            'MEND_QYDM' => '',                              //门店所在区域EHR编码
            'MEND_CS' => '南京',               //门店所在城市
            'MEND_DZ' => '南京市秦淮区童卫路9号1栋-1层-4号',           //门店地址
            'SHENQJE' => '10000',               //申请金额
            'SHENQJE_DX' => '壹万圆整',                         //申请金额大写
            'ZHANGHU' => '南京市玄武区武林卫水果店',       //收款账户
            'ZHANGHAO' => '8110501014501163703',        //收款账号
            'KAIHH' => '中信银行',                          //开户行
            'KAIHZH' => '南京江宁支行',                         //开户支行
            'SHENG' => '江苏',      //省
            'SHI' => '南京',            //市
            'MEND_FLZTMC' => '深圳百果园实业发展有限公司',      //门店法律主体名称
            'MEND_FLZTBM' => '01001001',                    //门店法律主体HER编码
            'FK_KMBM' => '1002006002',
            'FK_YHKH' => '777069966298',
            'WF_TITLE' => '南京-南京市秦淮区美林苑店',
            'WF_TDR' => '847'
        ];
    dd($this->remote_post('/internal_loan_apply', ['data' => $data]));
		
		
factor_proxy

return [
    'domain' => 'http://res-1.yitianxian.com:62000/factorth/',
    'encodingAesKey' => 'cgpythr9m5qdn1rvavedspl4az50g2d4',
    'appid' => 'BGYMS',
    'secret' => '5h6dhopq7o7235jf',
];

internal_factor_proxy

return [
    'domain' => 'http://res-1.yitianxian.com:62000/bgyfactorth/',
    'encodingAesKey' => 'cgpythr9m5qdn1rvavedspl4az50g2d4',
    'appid' => 'BGYMS',
    'secret' => '5h6dhopq7o7235jf',
];
		
