<?php


/*
	AAE      ���ű���
	AAF      ����ӪЭ��
	AAH		 �ŵ����޺�ͬ
*/


//���Ͳ������壺
    const TYPE_USER  = 1;
    const TYPE_STORE = 2;

    protected $_types = [
        self::TYPE_USER  => "������Ϣ",
        self::TYPE_STORE => "�ŵ���Ϣ"
    ];

    //�ͻ�����
    const TYPE_SUBJECT_LEGAL   = 1;
    const TYPE_SUBJECT_NATURAL = 2;

    protected $_subjectTypes = [
        self::TYPE_SUBJECT_LEGAL   => "����",
        self::TYPE_SUBJECT_NATURAL => "��Ȼ��"
    ];

    //֤������
    const TYPE_LICENSE_NO     = 1;
    const TYPE_LEGAL_REGISTRY = 2;
    const TYPE_ID_CARD        = 3;
    const TYPE_PASSPORT       = 4;
    const TYPE_MTPS           = 5;
    const TYPE_PERMIT         = 6;
    const TYPE_MOC            = 7;

    protected $_idTypes = [
        self::TYPE_LICENSE_NO     => "Ӫҵִ�ձ��",
        self::TYPE_LEGAL_REGISTRY => "���˵Ǽ�֤",
        self::TYPE_ID_CARD        => "���֤",
        self::TYPE_PASSPORT       => "����",
        self::TYPE_MTPS           => "̨��֤",
        self::TYPE_PERMIT         => "����֤",
        self::TYPE_MOC            => "����֤",
    ];

    //����״̬
    const STATUS_APPLY_INITAL  = 1;
    const STATUS_APPLY_PENDING = 2;
    const STATUS_APPLY_SUCCESS = 3;
    const STATUS_APPLY_FAILED  = 4;
    const STATUS_APPLY_INVALID = 5;

    protected $_applyStatusList = [
        self::STATUS_APPLY_INITAL  => "��ʼ״̬",
        self::STATUS_APPLY_PENDING => "�����",
        self::STATUS_APPLY_SUCCESS => "��������ͨ��",
        self::STATUS_APPLY_FAILED  => "����������ͨ��",
        self::STATUS_APPLY_INVALID => "������ʧЧ",
    ];

    //�������Ŷ������
    const TYPE_CREDIT_AMOUNT_CYCLE = 1;
    const TYPE_CREDIT_AMOUNT_ONCE  = 2;

    protected $_creditAmountTypes = [
        self::TYPE_CREDIT_AMOUNT_CYCLE => "ѭ��ʹ�ö��",
        self::TYPE_CREDIT_AMOUNT_ONCE  => "һ���Զ��",
    ];

    //�ſ�״̬
    const STATUS_LOAD_PENDING = 2;
    const STATUS_LOAD_SUCCESS = 3;
    const STATUS_LOAD_FAILED  = 4;
    const STATUS_LOAD_FULFIL  = 5;

    protected $_loadStatusList = [
        self::STATUS_LOAD_PENDING => "������",
        self::STATUS_LOAD_SUCCESS => "����ͨ��",
        self::STATUS_LOAD_FAILED  => "������ͨ��",
        self::STATUS_LOAD_FULFIL  => "�ſ����",
    ];

    //Э��״̬
    const STATUS_CREDIT_PROTOCOL_UNACTIVE  = 1;
    const STATUS_CREDIT_PROTOCOL_ACTIVE    = 2;
    const STATUS_CREDIT_PROTOCOL_ANNULMENT = 3;
    const STATUS_CREDIT_PROTOCOL_PAUSE     = 4;
    const STATUS_CREDIT_PROTOCOL_EPSTOPED  = 5;

    protected $_creditProtocolStatusList = [
        self::STATUS_CREDIT_PROTOCOL_UNACTIVE  => "δ��Ч",
        self::STATUS_CREDIT_PROTOCOL_ACTIVE    => "����Ч",
        self::STATUS_CREDIT_PROTOCOL_ANNULMENT => "����ֹ",
        self::STATUS_CREDIT_PROTOCOL_PAUSE     => "��ͣ",
        self::STATUS_CREDIT_PROTOCOL_EPSTOPED  => "�쳣��ֹ",
    ];


//select * from (select u.code,count(*) as num, s.mdkhmc, s.mdkhyh, s.mdkhzh from user u LEFT JOIN user_store_rel ur on u.`code`=ur.user_code LEFT JOIN store s on s.erp_code = ur.store_code where u.role="J" and s.mdkhmc != '' group by u.code) dd where dd.num > 1

/*
	ʹ��sshͨ����119.29.66.232��22  zhouhaiqing/ec9f18c5d8f
	���Կ⣺sma-test/10.8.15.9/3306/sma_w/123456
*/

//ͬ���û�����
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

//ͬ��store_sale���ֶΣ�
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
    <MOBILE>13423929690</MOBILE> //�ƶ��绰
    <SFZH>362302196711201037</SFZH> //���֤����
    <LASTNAME>������</LASTNAME>  //����
    <SFJMRY>0</SFJMRY> //�Ƿ������(1������,0�����)
    <SEX>1</SEX> //�Ա�
    <WORKCODE>20020912002</WORKCODE> //Ա�����
    <ACCOUNTNAME>������</ACCOUNTNAME> //���п�������
    <ACOUNTID>6217007200052939439</ACOUNTID> //���п��˺�
    <BANKNAME>�й���������</BANKNAME> //��������
    <SUBBRANCH>����֧��</SUBBRANCH> //�˺�֧��
    <PROVINCE>�㶫</PROVINCE> //ʡ��
    <CITY>����</CITY> //����
    <STATUS>�ڸ�Ա��</STATUS>  //��Ա��ְ״̬(�ڸ�Ա�� ����ְ���� ��ְ �ݼ�Ա�� ���� ��ְ��ֹ)
    <IDCARD>362302196711201037</IDCARD> //���֤����
    <NATIVEPLACE>����ʡ������</NATIVEPLACE> //����
    <BIRTHDAY>1967-11-20</BIRTHDAY> //��������
    <HIREDATE>2002-09-12</HIREDATE> //��ְ����
    <FOLK>����</FOLK> //����
    <POLICY>NULL</POLICY> //������ò
    <MARITALSTATUS>�ѻ�����</MARITALSTATUS> //����״��
    <EMAIL>NULL</EMAIL> //����
    <QQ>NULL</QQ> //QQ
    <SUBCOMPANYID>60755010027</SUBCOMPANYID> //������λ
    <DEPARTMENTID>60755010025</DEPARTMENTID> //������
    <DEPTTYPE>���ŵ�</DEPTTYPE> //�����ŵ�/�ܲ�
    <POSTID>HZX0001</POSTID> //��λID
    <POSTNAME>��֮���ܾ���</POSTNAME> //��λname=EHR��ְλ��δ���ŵ��ְλ
    <POSITIONNAME>�ܼ�</POSITIONNAME> //ְ��δ���ܲ���ְ��
    <STATE>1</STATE> //0��ְ�� 1��ְ
    <SFJRJJH>1</SFJRJJH> //�Ƿ��������
    <JRJJHRQ>2017-03-28</JRJJHRQ> //������������
    <JJHHF>20</JJHHF> //�������
    <ZHXGRQ>2018-11-16T09:38:52+08:00</ZHXGRQ> //�ӿ�����Ա����޸������ֶ�
    <DG>NULL</DG> //Ա�����ڱ��- 2018��10��11�����(���Ϊ1�����ڵ곤)
    <SFXN>NULL</SFXN> //�Ƿ������ɫ
    <DYRYBH>NULL</DYRYBH> //�����Ӧ
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
		
		//ͬ������
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
            throw new FactorException('������ѡ��һ���ŵ�');
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
                        throw new FactorException($val['customerName'] . ': �������Э�����Ŷ��');
                    }
                    if ($v['applyLoanAmount'] > $val['balanceAmount']) {
                        throw new FactorException($val['customerName'] . ': �������ʣ������ʷſ���');
                    }
                    if ($protocolInfo['astrictInd'] == 1 && $v['applyLoanAmount'] > $val['creditAmount']) {
                        throw new FactorException($val['customerName'] . ': ��������ŵ����������޶�');
                    }
                    if ($v['applyLoanAmount'] > $protocolInfo['unitLoanLimit']) {
                        throw new FactorException($val['customerName'] . ': ��������������ʿ���߶��');
                    }
                }
            }
            $data = $this->remote_post('factorth/api/loan/apply', $param);
            $rst = json_decode($data, true);
            if ($rst['errorCode'] != 0) {
                throw new FactorException($rst['errorMsg']);
            }
        }
        //�ſ�����ɹ�֮��,�޸ļ����̵ı���״̬Ϊ6
        $result = $this->get_user_state_by_token($token);
        if ($result['state'] == 5) {
            $this->change_user_state($token, '6');
        }
        return [
            'error_code' => 0,
            'message' => '����ɹ�'
        ];
    }
		
		
	$data = [
            'MS_DH' => 'BF0000016',                            //�ٹ����鵥��
            'SHENQR_XM' => '�Ͼ����ػ�������Է��',             //������
            'SHENQR_GH' => '20141211001',            //�����˹���
            'MS_SQLX' => '1',              //�����������
            'SHENQRQ' => date('Ymd'),                //��������
            'JIAMS_XM' => '�����',              //����������
            'JIAMS_GH' => '20141211001',             //�����̹���
            'JIAMS_SJH' => '17304470689',              //�������ֻ���
            'SHENQSM' => 'asd',                             //����˵��
            'MEND_DM_ERP_CODE' => '80025010147',  //�ŵ����ERP
            'MEND_DM_EHR_CODE' => '770147',  //�ŵ����EHR
            'MEND_MX' => '�Ͼ����ػ�������Է��',         //��������
            'MEND_QYMC' => '',                              //�ŵ�������������
            'MEND_QYDM' => '',                              //�ŵ���������EHR����
            'MEND_CS' => '�Ͼ�',               //�ŵ����ڳ���
            'MEND_DZ' => '�Ͼ����ػ���ͯ��·9��1��-1��-4��',           //�ŵ��ַ
            'SHENQJE' => '10000',               //������
            'SHENQJE_DX' => 'Ҽ��Բ��',                         //�������д
            'ZHANGHU' => '�Ͼ���������������ˮ����',       //�տ��˻�
            'ZHANGHAO' => '8110501014501163703',        //�տ��˺�
            'KAIHH' => '��������',                          //������
            'KAIHZH' => '�Ͼ�����֧��',                         //����֧��
            'SHENG' => '����',      //ʡ
            'SHI' => '�Ͼ�',            //��
            'MEND_FLZTMC' => '���ڰٹ�԰ʵҵ��չ���޹�˾',      //�ŵ귨����������
            'MEND_FLZTBM' => '01001001',                    //�ŵ귨������HER����
            'FK_KMBM' => '1002006002',
            'FK_YHKH' => '777069966298',
            'WF_TITLE' => '�Ͼ�-�Ͼ����ػ�������Է��',
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
		
