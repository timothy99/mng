create table mng_session (
    id varchar(128) not null,
    ip_address varchar(45) not null,
    timestamp int unsigned not null default 0,
    data mediumblob not null,
    key ci_sessions_timestamp (timestamp)
) engine=InnoDB default charset=utf8 comment='CodeIgniter를 위한 db session용 테이블';

create table mng_admin (
    a_idx int(11) not null auto_increment comment '관리자 번호',
    m_idx int(11) not null comment '회원 번호 [mng_member.m_idx]',
    start_date varchar(14) not null comment '관리자 권한 부여일',
    end_date varchar(14) not null default '99991231235959' comment '관리자 권한 삭제일',
    ins_id varchar(70) not null comment '등록자 [mng_member.member_id]',
    ins_date varchar(14) not null comment '등록일',
    upd_id varchar(70) not null comment '수정자 [mng_member.member_id]',
    upd_date varchar(14) not null comment '수정일',
    primary key (a_idx),
    unique key member_idx (m_idx)
) engine=innodb default charset=utf8 comment='관리자 권한 부여';

create table mng_board (
    b_idx int(11) not null auto_increment comment '게시물 번호',
    board_id varchar(20) default null comment '게시판 아이디',
    category varchar(20) default null comment '카테고리',
    title varchar(1000) not null comment '제목',
    contents text not null comment '내용',
    http_link varchar(500) default null comment '인터넷 링크',
    comment_cnt int(11) not null default 0 comment '댓글 등록수',
    heart_cnt int(11) not null default 0 comment '공감수',
    hit_cnt int(11) not null default 0 comment '조회수',
    del_yn enum('y','n') not null default 'n' comment '삭제 여부',
    ins_id varchar(70) not null comment '등록자 [mng_member.member_id]',
    ins_date varchar(14) not null comment '등록일',
    upd_id varchar(70) not null comment '수정자 [mng_member.member_id]',
    upd_date varchar(14) not null comment '수정일',
    primary key (b_idx),
    unique key board_id (board_id)
) engine=innodb default charset=utf8 comment='게시판';

create table mng_board_comment (
    bc_idx int(11) not null auto_increment comment '인덱스',
    b_idx int(11) not null comment '게시물 번호 [mng_board.b_idx]',
    comment varchar(4000) not null comment '댓글',
    del_yn enum('Y', 'N') not null comment '삭제 여부',
    ins_id varchar(70) default null comment '등록자 [mng_member.m_idx]',
    ins_date varchar(14) not null comment '등록일',
    upd_id varchar(70) default null comment '수정자 [mng_member.m_idx]',
    upd_date varchar(14) not null comment '수정일',
    primary key (bc_idx)
) engine=innodb default charset=utf8 comment='게시판 댓글';

create table mng_file (
    f_idx int(11) not null auto_increment comment '연번',
    file_id varchar(32) default null comment '파일 불러오기를 위한 id',
    file_name_org varchar(1000) not null comment '원본 파일명',
    file_directory varchar(10) not null comment '저장된 파일의 경로(연/월)',
    file_name_uploaded varchar(1000) not null comment '저장된 파일 전체 경로',
    file_size int(11) not null comment '파일 크기',
    mime_type varchar(200) not null comment '파일 mime type',
    category varchar(100) not null comment '사용자가 지정한 파일 형식',
    del_yn enum('Y', 'N') not null comment '삭제 여부',
    ins_id varchar(70) not null comment '등록자 [mng_member.m_idx]',
    ins_date varchar(14) not null comment '등록일',
    upd_id varchar(70) not null comment '수정자 [mng_member.m_idx]',
    upd_date varchar(14) not null comment '수정일',
    primary key (f_idx),
    unique key file_id (file_id)
) engine=innodb default charset=utf8 comment='파일 정보';

create table mng_member (
    m_idx int(11) not null auto_increment comment '인덱스',
    member_id varchar(64) not null comment '사용자 아이디',
    member_name varchar(60) not null comment '이름',
    member_nickname varchar(60) not null comment '별명',
    email varchar(100) default null comment '이메일',
    phone varchar(13) default null comment '휴대전화 번호',
    gender varchar(1) default null comment '성별',
    post_code varchar(5) default null comment '우편번호',
    addr1 varchar(200) default null comment '주소1',
    addr2 varchar(200) default null comment '주소2',
    join_type varchar(10) default null comment '가입경로(sns등)',
    email_yn enum('Y', 'N') not null comment '이메일 수신여부',
    post_yn enum('Y', 'N') not null comment '우편물 수신 여부',
    sms_yn enum('Y', 'N') not null comment 'sms 수신 여부',
    auth_group varchar(20) not null comment '권한 그룹',
    last_login_date varchar(14) not null comment '최종 로그인 시간',
    last_login_ip varchar(15) default null comment '마지막 로그인 ip',
    del_yn enum('Y', 'N') not null comment '삭제 여부',
    ins_id varchar(70) default null comment '등록자 [mng_member.m_idx]',
    ins_date varchar(14) not null comment '등록일',
    upd_id varchar(70) default null comment '수정자 [mng_member.m_idx]',
    upd_date varchar(14) not null comment '수정일',
    org_seq int(11) default null comment '원본 seq',
    primary key (m_idx),
    unique key mem_usr_id (member_id)
) engine=innodb default charset=utf8 comment='회원정보';